<?php   
    
    if(!isset($url_parts[3])) {
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }

    // Invoking wishlist model because it extends books and i need both
    require("models/wishlist.php");
    $model = new Wishlist();

    // Checking if url containes /book/id
    if(isset($url_parts[4]) &&  filter_var($url_parts[4], FILTER_VALIDATE_INT)) {
        $book_id = $url_parts[4];
    }

    
    $books = $model->getBooks();
    $wishlists = $model->getLists();
    
    $category = $url_parts[3];
    switch($category) {
        case "health": require("views/categories/health.php"); break;
        case "it": require("views/categories/it.php"); break;
        case "psychology": require("views/categories/psychology.php"); break;
        case "ebooks": require("views/categories/ebooks.php"); break;
        case "textbooks": require("views/categories/textbooks.php"); break;
    }
    

