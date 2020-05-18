<?php 

    if(isset($url_parts[3])) {

        $section = $url_parts[3];
    
        if($section === "booksManaging") {
            
            require("models/book.php");
            $bookModel = new Book();
            
            $categories = $bookModel->getCategories();
            
            require("views/admin/addBooks.php");
        }

        if($section === "usersManaging") {

        }

        if($section === "ordersManaging") {

        }

    } else {

        require("views/admin/adminDashboard.php");
    }