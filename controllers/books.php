<?php   
    
    if(!isset($url_parts[5])) {
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }
    
    $category = $url_parts[5];

    switch($category) {
        case "health": require("views/categories/health.php"); break;
        case "it": require("views/categories/it.php"); break;
        case "psychology": require("views/categories/psychology.php"); break;
        case "ebooks": require("views/categories/ebooks.php"); break;
        case "textbooks": require("views/categories/textbooks.php"); break;
    }
    

