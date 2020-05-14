<?php

    class Base {
        
        protected $db;

        public function __construct()
        {
            $this->db = new PDO("mysql:host=localhost;dbname=Mini_Bertrand;charset=utf8mb4", "root", "");
        }

        public function sanitizer($data) {
            
            foreach($data as $key => $value) {
                $data[$key] = strip_tags(trim($value));
            }

            return $data;

        }
    }