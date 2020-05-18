<?php
    require("base.php");

    class Book extends Base {

        public function getBooks() {
            
            $query = $this->db->prepare("SELECT * FROM books");
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

            $query = $this->db->prepare("SELECT category AS category_name FROM books GROUP BY category");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;

        }
    }