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
    }