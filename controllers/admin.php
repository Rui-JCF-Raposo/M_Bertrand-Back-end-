<?php

    if(!isset($_SESSION["user"]) || (int)$_SESSION["user"]["admin"] !== 1) {
        header("HTTP/1.1 403 Forbidden");
        die("403 Forbidden");
    }


    if(isset($url_parts[3])) {

        if($url_parts[3] === "booksManaging") {
            require("models/book.php");
            $bookModel = new Book();
        } else if($url_parts[3] === "usersManaging") {
            require("models/user.php");
            $userModel = new User();
        } else if($url_parts[3] === "ordersManaging") {
            require("models/order.php");
            $ordersModel = new Order();
        }
    }


    if($_SERVER["REQUEST_METHOD"] === "POST") {

        /*------------------------------------------------------------------*/
        /*--------------------------Books Managing--------------------------*/
        /*------------------------------------------------------------------*/
        if(isset($_POST["add-book"])) {
            
            $data = $_POST;
            $img_file = $_FILES["book_cover"];                    
            $rowsAffected = $bookModel->createBook($data, $img_file);
            $result_2 = $bookModel->enableCategory($data["category"], "create_book");

            if($rowsAffected > 0 && $result_2) {
                $book_created = true;
                $_SESSION["total_books"] = count($bookModel->getBooks());
            } else if($rowsAffected === 0) {
                $book_repetition = true;
            } else if(empty($rowsAffected)) {
                $book_created = false;
            }
        
            require("templates/booksManagerMessage.php");
            exit;

        }

        if(isset($_POST["remove-book"])) {
            
            if(!isset($_POST["rm-book"])) {
                header("HTTP/1.1 400 Bad Request");
                die("400 Bad Request");
            }

            $result = $bookModel->removeBook($_POST["rm-book"]);
            if($result) {
                $book_removed = true;
                $_SESSION["total_books"] = count($bookModel->getBooks());
            } else {
                $book_removed = false;
            }

            require("templates/booksManagerMessage.php");
            exit;

        }   

        if(isset($_POST["add-category"])) {
            
            //Verificar se a categoria já existe, estando desactivada
            $category_id = $bookModel->getCategoryByName(strtolower($_POST["newCategory"]));
            if(!empty($category_id)) {
                
                $enabled = $bookModel->enableCategory($category_id, "crated_category");
                if($enabled) {
                    $repetition = true;
                } else {
                    $repetition = false;
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
            exit;

        }   

        if(isset($_POST["remove-category"])) {
        
            if(!isset($_POST["rm-category"])) {
                header("HTTP/1.1 400 Bad Request");
                die("400 Bad Request");
            }

            $books = $bookModel->getBooks();
            $category_contains_books = false;

            foreach($books as $book) {
                if($book["category_id"] === $_POST["rm-category"]) {
                    $category_contains_books = true;
                    break;
                }
            }

            if(!$category_contains_books) {
                
                $result = $bookModel->removeCategory($_POST["rm-category"]);
                if($result) {
                    $category_removed = true;
                } else {
                    $category_removed = false;
                }

            }

            require("templates/booksManagerMessage.php");
            exit;

        }   

        /*------------------------------------------------------------------*/

        /*------------------------------------------------------------------*/
        /*--------------------------Users Managing--------------------------*/
        /*------------------------------------------------------------------*/
        if(isset($_POST["block-user"])) {

            $result = $userModel->toggleBlockUser($_POST["user_id"], "block");
            if($result) {
                header("Location: ".BASE_PATH."admin/usersManaging");
            } else {
                header("HTTP/1.1 400 Bad Request");
                die("400 Bad Request");
            }

        }

        if(isset($_POST["unblock-user"])) {

            $result = $userModel->toggleBlockUser($_POST["user_id"], "unblock");
            if($result) {
                header("Location: ".BASE_PATH."admin/usersManaging");
            } else {
                header("HTTP/1.1 400 Bad Request");
                die("400 Bad Request");
            }

        }

    }


    if(isset($url_parts[3])) {

        $section = $url_parts[3];

        if($section === "booksManaging") {

            $books = $bookModel->getBooks();
            $categories = $bookModel->getCategories();
            require("views/admin/booksManaging.php");

        }

        if($section === "usersManaging") {

            $users = $userModel->getUsers();
            require("views/admin/usersManaging.php");
        
        }


        if($section === "ordersManaging") {
            if(isset($url_parts[4]) && is_numeric($url_parts[4])) {
                $order_id = $url_parts[4];
                $order_details = $ordersModel->getOrderOnlyById($order_id);
                require("views/admin/adminOrdersDetails.php");
                exit;
            }

            /*  Logic to apply orders managing pagination ------------- */

            $totalOrders = $ordersModel->countAllOrders();
            $totalOrders = ceil($totalOrders / 5);
            
            
            if(!isset($_SESSION["page_number"])) {
                $pageOffset = 1;
                $pageNumber = 1;
                $_SESSION["page_number"] = $pageNumber;
                $_SESSION["page_offset"] = $pageOffset;
            } else {
                $pageOffset =  $_SESSION["page_offset"];
                $pageNumber =  $_SESSION["page_number"];
            }

            if(isset($_POST["pageUp"])) { 
                if(isset($pageNumber)) {
                    if($pageNumber < $totalOrders) {
                        $pageOffset = $pageNumber * 5;
                        $pageNumber++;
                        $_SESSION["page_number"] = $pageNumber;
                        $_SESSION["page_offset"] = $pageOffset;
                    }
                }
            } else if(isset($_POST["pageDown"])) {
                if(isset($pageNumber)) {
                    if($pageNumber > 1) {
                        $pageOffset -= 5;
                        $pageNumber--;
                        $_SESSION["page_number"] = $pageNumber;
                        $_SESSION["page_offset"] = $pageOffset;
                    }
                }
            }
            $orders = $ordersModel->getAllOrders($pageOffset);
            //echo count($orders); exit;
            require("views/admin/ordersManaging.php");

            /*  -------------------------------------------------------- */
        }
        
    } else {
        require("views/admin/adminDashboard.php");
    }

    
























































































    // if(
    //     isset($url_parts[4]) && 
    //     $url_parts[2] === "admin"
    // ) {

    //     $books_allowed_actions = ["addBook", "addCategory", "removeBook", "removeCategory"];
    //     $users_allowed_actions = ["blockUser", "sendMessage"];
    //     $action = $url_parts[4];
    //     /*------------------------------------------------------------------*/
    //     /*--------------------------Books Managing--------------------------*/
    //     /*------------------------------------------------------------------*/

    //     if( 
    //        in_array($url_parts[4], $books_allowed_actions) && 
    //        $url_parts[3] === "booksManaging"
    //     ) {
            
            
    //         if($action === "addBook") {

    //             $data = $_POST;
    //             $img_file = $_FILES["book_cover"];                    
        
    //             $rowsAffected = $bookModel->createBook($data, $img_file);

    //             $result_2 = $bookModel->enableCategory($data["category"]);

    //             if($rowsAffected > 0 && $result_2) {
    //                 $book_created = true;
    //             } else if($rowsAffected === 0) {
    //                 $book_repetition = true;
    //             } else if(empty($rowsAffected)) {
    //                 $book_created = false;
    //             }
                
    //             require("templates/booksManagerMessage.php");
                
    //         }

    //         if($action === "addCategory") {

    //             // Verificar se a categoria já existe, estando desactivada
    //             $category_id = $bookModel->getCategoryByName(strtolower($_POST["newCategory"]));
    //             if(!empty($category_id)) {
                    
    //                 $enabled = $bookModel->enableCategory($category_id);
    //                 if($enabled) {
    //                     $created_category = true;
    //                 } else {
    //                     $created_category = false;
    //                 }
                    
    //                 require("templates/booksManagerMessage.php");
    //                 exit;
    //             }
                
    //             $rowsAffected= $bookModel->createCategory($_POST);
    //             if($rowsAffected > 0) {
    //                 $created_category = true;
    //             } else if($rowsAffected === 0) {
    //                 $repetition = true;

    //             } else if(empty($rowsAffected)) {
    //                 $created_category = false;
    //             }
                
    //             require("templates/booksManagerMessage.php");
                
    //         }

    //         if($action === "removeBook") {
                
    //             if(!isset($_POST["send"])) {
    //                 header("HTTP/1.1 400 Bad Request");
    //                 die("400 Bad Request");
    //             }

    //             $result = $bookModel->removeBook($_POST["rm-book"]);
    //             if($result) {
    //                 $book_removed = true;
    //             } else {
    //                 $book_removed = false;
    //             }

    //             require("templates/booksManagerMessage.php");
                
    //         }
    
    //         if($action === "removeCategory") {
                
    //             if(!isset($_POST["rm-category"])) {
    //                 header("HTTP/1.1 400 Bad Request");
    //                 die("400 Bad Request");
    //             }

    //             $result = $bookModel->disableCategory($_POST["rm-category"]);
    //             if($result) {
    //                 $category_removed = true;
    //             } else {
    //                 $category_removed = false;
    //             }

    //             require("templates/booksManagerMessage.php");
    //         }

    //     }  else if( 
    //         in_array($url_parts[4], $users_allowed_actions) && 
    //         $url_parts[3] === "usersManaging"
    //     ) { 

    //         /*------------------------------------------------------------------*/
    //         /*--------------------------Users Managing--------------------------*/
    //         /*------------------------------------------------------------------*/
    //         if($action === "blockUser") {
    //             echo "Block User works";
    //             echo $_POST["user_id"]; exit;
    //         }
            

    //     }

      
        

    // }