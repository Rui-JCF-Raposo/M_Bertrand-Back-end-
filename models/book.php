<?php
    require("base.php");

    class Book extends Base {

        public function getBooks() {
            
            $query = $this->db->prepare("
                SELECT *
                FROM books AS b
                INNER JOIN book_categories AS bc ON(b.category = bc.category_id)
            ");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            
            if(empty($data)) {
                return false;
            }

            return $data;

        }

        public function getBookById($id) 
        {

            $query = $this->db->prepare("SELECT * FROM books WHERE book_id = ?");
            $query->execute([(int)$id]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            
            return $data;

        }

        public function getCategories() 
        {

            $query = $this->db->prepare("
                SELECT category_id, category_name, active
                FROM book_categories
                ORDER BY category_name ASC
            ");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;

        }

        public function createCategory($data) 
        {
            $data = $this->sanitizer($data);

            if(
                !empty($data["newCategory"]) &&
                mb_strlen($data["newCategory"]) >= 2
            ) {
                    
                $query = $this->db->prepare("
                    INSERT INTO book_categories
                    (category_name, active)
                    VALUES(?, 0)
                ");

                $result = $query->execute([
                    strtolower($data["newCategory"])
                ]);

                $rowsAffected = $query->rowCount();
                
                return $rowsAffected;
            

            } else {
                return false;
            }

        }

        public function createBook($data, $img_file) 
        {

            $data = $this->sanitizer($data);

            if(
                !empty($data["price"]) && 
                !empty($data["stock"]) &&
                !empty($data["pages"]) &&
                !empty($data["isbn"]) &&
                is_numeric($data["pages"]) &&
                is_numeric($data["isbn"]) &&
                $data["pages"] >= 1 && $data["pages"] <= 30000 &&
                mb_strlen($data["isbn"]) === 10 || mb_strlen($data["isbn"]) === 13 &&
                !empty($data["name"]) && mb_strlen($data["name"]) >= 2 &&
                !empty($data["author"]) && mb_strlen($data["author"]) >= 2 &&
                is_numeric($data["price"]) && $data["price"] > 0 && $data["price"] <= 50000 && 
                is_numeric($data["stock"]) && $data["stock"] > 0 && $data["stock"] <= 10000000 &&
                !isset($img_file["error"]) &&
                $img_file["type"] === "image/jpeg" ||
                $img_file["type"] === "image/png" 
            ) {

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $detected_file = finfo_file($finfo, $_FILES["book_cover"]["tmp_name"]);

            
                if($detected_file === "image/jpeg") {

                    $file_ext = ".jpeg";
                    $newCoverName = substr(sha1(mt_rand(1000000000000, 9999999999999)), 1 , 30);
                    
                } else if($detected_file === "image/png") {
                    
                    $file_ext = ".png";
                    $newCoverName = substr(sha1(mt_rand(1000000000000, 9999999999999)), 1 , 30);
                
                } else {
                    return false;
                }

                $tmp_file = $img_file["tmp_name"];
                $dir = "img/book-images/".$newCoverName.$file_ext;
                move_uploaded_file($tmp_file, $dir);

                $query = $this->db->prepare("
                    INSERT INTO books
                    (title, author, cover, category, page_count, price, isbn)
                    VALUES(?, ?, ?, ?, ?, ?, ?)
                ");

                $result = $query->execute([
                    $data["name"],
                    $data["author"],
                    $newCoverName.$file_ext,
                    $data["category"],
                    $data["pages"],
                    $data["price"],
                    $data["isbn"]
                ]);

                $rowsAffected = $query->rowCount();

                return $rowsAffected;

            } else {
                return false;
            }


        }

        public function enableCategory($id) 
        {

            if(!empty($id) && is_numeric($id) && $id > 0) {

                $updateQueery = $this->db->prepare("
                        UPDATE book_categories
                        SET active = 1
                        WHERE category_id = ?
                ");
    
                $result = $updateQueery->execute([$id]);
    
                return $result;

            } else {
                return false;
            }

        }
        
        public function disableCategory($id) 
        {

            if(!empty($id) && is_numeric($id) && $id > 0) {

                $updateQueery = $this->db->prepare("
                        UPDATE book_categories
                        SET active = 0
                        WHERE category_id = ?
                ");
    
                $result = $updateQueery->execute([$id]);
    
                return $result;

            } else {
                return false;
            }

        }

        public function getCategoryByName($name) 
        {

            if(empty($name) || !is_string($name)) {
                return false;
            }

            $query = $this->db->prepare("
                SELECT category_id
                FROM book_categories
                WHERE category_name = ?
            ");

            $query->execute([$name]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result["category_id"];

        }

        public function removeBook($id)
        {

            if(empty($id) && !is_numeric($id)) {
                return false;
            }

            $query = $this->db->prepare("
                DELETE FROM books
                WHERE book_id = ?
            ");

            $result = $query->execute([$id]);

            return $result;

        }


    }