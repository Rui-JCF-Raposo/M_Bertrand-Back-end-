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

        public function getLastListId() 
        {
            
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

        public function removeList($id) {

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

        public function addBook($data) 
        {

            if(
                !empty($data["book_id"]) && 
                !empty($data["list_id"]) && 
                is_numeric($data["list_id"]) && 
                is_numeric($data["list_id"]) &&
                $data["book_id"] > 0 && 
                $data["list_id"] > 0  
            ) {

                $query = $this->db->prepare("
                    INSERT INTO wishlist_books
                    (list_id, book_id, user_id)
                    VALUES(?, ?, ?)
                ");

                $query->execute([
                    (int)$data["list_id"],
                    (int)$data["book_id"],
                    (int)$data["user_id"],
                ]);

                $rowsAffected = $query->rowCount();
                return $rowsAffected;

            } else {
                return false;
            }

        }

        public function getWishlistBooks($user_id, $list_id) 
        {

            if(
                !empty($user_id) &&
                !empty($list_id) &&
                is_numeric($user_id) &&
                is_numeric($list_id) &&
                $user_id > 0 &&
                $list_id > 0
            ) {

            }
            
            $query = $this->db->prepare("
                SELECT 
                    wb.book_id, wb.list_id, b.title, b.author, b.cover, b.price 
                FROM 
                    wishlist_books AS wb
                INNER JOIN 
                    books AS b USING(book_id)
                WHERE 
                    user_id = ? AND list_id = ?

            ");

            $query->execute([
                $user_id, 
                $list_id
            ]);

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }

        public function removeBook($data) 
        {
            $data = $this->sanitizer($data);

            if(
                !empty($data["book_id"]) &&
                !empty($data["list_id"]) &&
                !empty($data["user_id"]) &&
                is_numeric($data["book_id"]) &&
                is_numeric($data["list_id"]) &&
                is_numeric($data["user_id"])  &&
                $data["book_id"] > 0 &&
                $data["list_id"] > 0 &&
                $data["user_id"] > 0  
            ) {

                $query = $this->db->prepare("
                    DELETE FROM wishlist_books 
                    WHERE user_id = ? AND list_id = ? AND book_id = ?
                ");

                $query->execute([
                    $data["user_id"],
                    $data["list_id"],
                    $data["book_id"],
                ]);

                $rowsAffected = $query->rowCount();
                return $rowsAffected;

            } else {
                return false;
            }
        }
    }