<?php
    require("base.php");
    
    class User extends Base {

        public function create($data) 
        {

            $data = $this->sanitizer($data);

            if(
                !empty($data["userName"]) && mb_strlen($data["userName"]) >= 2 &&
                filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
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
    }