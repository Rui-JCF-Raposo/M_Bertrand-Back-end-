<?php

    if(!isset($_SESSION["user"]) || (int)$_SESSION["user"]["admin"] !== 1) {
        header("HTTP/1.1 401 Unauthorized");
        die("401 Unauthorized");
    }

    if(isset($url_parts[3])) {

        require("models/book.php");
        $bookModel = new Book();

        if(!isset($url_parts[4])) {

            $section = $url_parts[3];
            if($section === "booksManaging") {

                $books = $bookModel->getBooks();
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
            $white_list = ["addBook", "addCategory", "removeBook", "removeCategory"];
            if( 
                isset($url_parts[4]) && 
                in_array($url_parts[4], $white_list) && 
                $url_parts[2] === "admin"
            ) {
                
                $action = $url_parts[4];
                
                if($action === "addBook") {

                
                   
                    $data = $_POST;
                    $img_file = $_FILES["book_cover"];                    
            
                    $rowsAffected = $bookModel->createBook($data, $img_file);

                    $result_2 = $bookModel->enableCategory($data["category"]);

                    if($rowsAffected > 0 && $result_2) {
                        $book_created = true;
                    } else if($rowsAffected === 0) {
                        $book_repetition = true;
                    } else if(empty($rowsAffected)) {
                        $book_created = false;
                    }
                    
                    require("templates/booksManagerMessage.php");
                    
                }

                if($action === "addCategory") {

                    // Verificar se a categoria já existe, estando desactivada
                    $category_id = $bookModel->getCategoryByName(strtolower($_POST["newCategory"]));
                    if(!empty($category_id)) {
                        
                        $enabled = $bookModel->enableCategory($category_id);
                        if($enabled) {
                            $created_category = true;
                        } else {
                            $created_category = false;
                        }
                        
                        require("templates/booksManagerMessage.php");
                        exit;
                    }
                    
                    $rowsAffected= $bookModel->createCategory($_POST);
                    if($rowsAffected > 0) {
                        $created_category = true;
                    } else if($rowsAffected === 0) {
                        $repetition = true;

                    } else if(empty($rowsAffected)) {
                        $created_category = false;
                    }
                    
                    require("templates/booksManagerMessage.php");
                    
                }

                if($action === "removeBook") {
                    
                    if(!isset($_POST["send"])) {
                        header("HTTP/1.1 400 Bad Request");
                        die("400 Bad Request");
                    }

                    $result = $bookModel->removeBook($_POST["rm-book"]);
                    if($result) {
                        $book_removed = true;
                    } else {
                        $book_removed = false;
                    }

                    require("templates/booksManagerMessage.php");
                    
                }
        
                if($action === "removeCategory") {
                    /* Ao remover uma categoria, convém fazer apenas active = 0. Pois futuramente, ao criar categoria, se já existir na base dados, passa active = 1 */
                    
                    if(!isset($_POST["rm-category"])) {
                        header("HTTP/1.1 400 Bad Request");
                        die("400 Bad Request");
                    }

                    $result = $bookModel->disableCategory($_POST["rm-category"]);
                    if($result) {
                        $category_removed = true;
                    } else {
                        $category_removed = false;
                    }

                    require("templates/booksManagerMessage.php");
                }
            }
            
        }

        
    } else {
        require("views/admin/adminDashboard.php");
    }