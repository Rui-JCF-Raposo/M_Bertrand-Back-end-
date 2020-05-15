<?php
    require("book.php");

    class Wishlist extends Book {

        public function getLists($user_id) 
        {
            $query = $this->db->prepare("SELECT * FROM wishlist WHERE user_id = ?");
            $query->execute([$user_id]);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            if(empty($data)) {
                return false;
            }

            return $data;
        }

        public function create($user_id, $name) 
        {
            $name = filter_var($name, FILTER_SANITIZE_STRING);

            if(!empty($name)) {

                $query = $this->db->prepare("
                    INSERT INTO wishlist
                    (user_id, name, active)
                    VALUES(?, ?, 1)
                ");
                $result = $query->execute([$user_id, $name]);
                
                $rowsAffected = $query->rowCount();
                return $rowsAffected;


            } else {
                return false;
            }

        }

        public function edit($data) 
        {
            if(!isset($data["last_id"])) {
                $lastData = $this->getLastListId();
                $data["list_id"] = $lastData["list_id"];
            }
            
            $data = $this->sanitizer($data);

            if(!empty($data["name"])) {

                
                $query = $this->db->prepare("
                    UPDATE wishlist
                    SET name = ?
                    WHERE list_id = ?
                ");
                
                $query->execute([
                    $data["name"],
                    (int)$data["list_id"]
                ]); 

                $rowsAffected = $query->rowCount();
                return $rowsAffected;

            } else {
                return false;
            }

        }

        public function getLastListId() {
            
            $query = $this->db->prepare("
                SELECT list_id
                FROM wishlist
                ORDER BY list_id DESC
                LIMIT 1
            ");
            $query->execute();
            $last_id = $query->fetch(PDO::FETCH_ASSOC);
            return $last_id; 
        
        }

        public function remove($id) {

            if(empty($id)) {    
                return false;
            }   

            $query = $this->db->prepare("
                DELETE FROM wishlist
                WHERE list_id = ?   
            ");
            $query->execute([(int)$id]);

            $rowsAffected = $query->rowCount();
            return $rowsAffected;

        } 
    }