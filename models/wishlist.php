<?php
    require("book.php");

    class Wishlist extends Book {

        public function getLists() 
        {
            $query = $this->db->prepare("SELECT * FROM wishlist");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            if(empty($data)) {
                return false;
            }

            return $data;
        }
    }