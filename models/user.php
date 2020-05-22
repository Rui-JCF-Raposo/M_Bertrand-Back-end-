<?php
    require("base.php");
    
    class User extends Base {

        public function create($data) 
        {

            $data = $this->sanitizer($data);

            if(
                !empty($data["userName"]) && mb_strlen($data["userName"]) >= 2 &&
                filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
                mb_strlen($data["email"]) <= 254 &&
                !empty($data["password"]) && !empty($data["passwordConfirm"]) &&
                $data["password"] === $data["passwordConfirm"] &&
                mb_strlen($data["password"]) >= 6 
            ) {

                $query = $this->db->prepare("
                    INSERT INTO users
                    (name, email, password, card_number, active)
                    VALUES(?, ?, ?, ?, 1)
                ");

                $query->execute([
                    $data["userName"],
                    $data["email"],
                    password_hash($data["password"], PASSWORD_DEFAULT),
                    (int)$data["readerCardNumber"]
                ]);

                $user_id = $this->db->lastInsertId();

                return $user_id;

            } else {
                return false;
            }

        }

        public function getUsers() 
        {

            $query = $this->db->prepare("
                SELECT  user_id, name, email, card_number, admin, active
                FROM users
            ");

            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            return $data;
            


        }

        public function getUser($id) 
        {
            
            $query = $this->db->prepare("
                SELECT user_id, name, email, card_number
                FROM users 
                WHERE user_id = ?
            ");

            $query->execute([$id]);

            $data = $query->fetch(PDO::FETCH_ASSOC);

            if(empty($data)) {
                return false;
            }

            return $data;

        }

        public function validateLogin($data) 
        {

            if(
                filter_var($data["userEmail"], FILTER_VALIDATE_EMAIL) &&
                !empty($data["password"]) 
            ) {

                $query = $this->db->prepare("
                    SELECT user_id, name, email, password, card_number, admin
                    FROM users
                    WHERE email = ?
                ");
    
                $query->execute([$data["userEmail"]]);
    
                $user = $query->fetch(PDO::FETCH_ASSOC);
    
                if(empty($user)) {
                    return false;
                }
    
                if(password_verify($data["password"], $user["password"])) {
                    $user["password"] = "hidden";
                    return $user;
                }
            } else {
                return false;
            }

        }
        
        public function toggleBlockUser($user_id, $action) 
        {

            if(empty($user_id) || !is_numeric($user_id)) {
                return false;
            }

            if($action === "block") {
                $active = 0;
            } else if($action === "unblock") {
                $active = 1;
            }

            $query = $this->db->prepare("
                UPDATE users 
                SET active = ?
                WHERE user_id = ?
            ");

            $result = $query->execute([$active, $user_id]);

            return $result;

        }

        public function updateUserName($name) 
        {

            $name = strip_tags(trim($name));

            if(!empty($name) && is_string($name) && mb_strlen($name) > 2) {

                $query = $this->db->prepare("
                    UPDATE users
                    SET name = ? 
                    WHERE user_id = ?
                ");
                $result = $query->execute([$name, $_SESSION["user"]["user_id"]]);
                return $result;

            }
        }

        public function updateUserEmail($email) 
        {
            $email = strip_tags(trim($email));

            if(
                !empty($email) && 
                is_string($email) && 
                mb_strlen($email) <= 254 &&
                filter_var($email, FILTER_VALIDATE_EMAIL)
            ) {

                $query = $this->db->prepare("
                    UPDATE users
                    SET email = ?
                    WHERE user_id = ?
                ");

                $result = $query->execute([$email, $_SESSION["user"]["user_id"]]);

                return $result;

            }
        }

        public function updateUserCardNumber($card_number) 
        {
            
            if(
                !empty($card_number) && 
                is_numeric($card_number) &&
                mb_strlen($card_number) <= 10
            ) {

                $query = $this->db->prepare("
                    UPDATE users
                    SET card_number = ?
                    WHERE user_id = ?
                ");

                $result = $query->execute([$card_number, $_SESSION["user"]["user_id"]]);

                return $result;

            }

        }

        public function updatePassword($data) 
        {

            if(
                !empty($data["current_password"]) &&
                !empty($data["new_password"]) &&
                !empty($data["rep_new_password"]) &&
                $data["new_password"] === $data["rep_new_password"] &&
                mb_strlen($data["new_password"]) >= 6 &&
                mb_strlen($data["rep_new_password"]) >= 6 
            ) {
                
                $query = $this->db->prepare("
                    SELECT password
                    FROM users
                    WHERE user_id = ?
                ");

                $query->execute([$_SESSION["user"]["user_id"]]);
                $user = $query->fetch(PDO::FETCH_ASSOC);

                if(password_verify($data["current_password"], $user["password"])) {
                    
                    $update_query = $this->db->prepare("
                        UPDATE users
                        SET password = ?
                        WHERE user_id = ?
                    ");

                    $result = $update_query->execute([
                        password_hash($data["new_password"], PASSWORD_DEFAULT),
                        $_SESSION["user"]["user_id"]
                    ]);

                    return $result;
                
                } else {
                    return false;
                }

            } else {
                return false;
            }

        }
    }