<?php 

    if(isset($url_parts[3])) {

        require("models/book.php");
        $bookModel = new Book();

        if(!isset($url_parts[4])) {

            $section = $url_parts[3];
            if($section === "booksManaging") {

                $categories = $bookModel->getCategories();
                require("views/admin/booksManaging.php");

            }
    
            if($section === "usersManaging") {
                require("views/admin/usersManaging.php");
            }
    
            if($section === "ordersManaging") {
                require("views/admin/ordersManaging.php");
            }
        } else {

            // Managing Create Book and Add Category
            $white_list = ["addBook", "addCategory"];
            if( 
                isset($url_parts[4]) && 
                in_array($url_parts[4], $white_list) && 
                $url_parts[2] === "admin"
            ) {
                
                $action = $url_parts[4];
                
                if($action === "addBook") {
                   
                    $data = $_POST;
                    $img_file = $_FILES["book_cover"];                    
            
                    $result = $bookModel->createBook($data, $img_file);
                    $result_2 = $bookModel->enableCategory($data["category"]);
                    if($result && $result_2) {
                        $book_created = true;
                        require("templates/booksManagerMessage.php");
                    } else {
                        $book_created = false;
                        require("templates/booksManagerMessage.php");
                    }
                    
                }

                if($action === "addCategory") {

                    $result = $bookModel->createCategory($_POST);
                    if($result) {
                        $created_category = true;
                        require("templates/booksManagerMessage.php");
                    } else {
                        $created_category = false;
                        require("templates/booksManagerMessage.php");
                    }
                
                }
            }

        }


    } else {
        require("views/admin/adminDashboard.php");
    }