<?php   
    
    if(!isset($url_parts[3])) {
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }

    // Invoking wishlist model because it extends books and i need both
    require("models/wishlist.php");
    $model = new Wishlist();


    if(isset($_GET["search"])) {
        $books_found = $model->searchBook($_GET["search"]);
    }

    // Checking if url containes /book/id for get book by id
    if(isset($url_parts[3]) &&  filter_var($url_parts[3], FILTER_VALIDATE_INT)) {
        $book_id = $url_parts[3];
        $book = $model->getBookById($book_id);
        echo json_encode($book); exit;
    } 
    
    $books = $model->getBooks();
    $categories = $model->getCategories();

    
    if(isset($_SESSION["user"])) {
        $wishlists = $model->getLists($_SESSION["user"]["user_id"]);
    }

    $category = $url_parts[3];

    if(isset($url_parts[3]) && $url_parts[3] === "edit") {
        if($_SERVER["REQUEST_METHOD"] === "PUT") {
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $model->editBook($data);
            echo $result; exit;
        }
    }

    require("views/categories/category.php");
    
    if(isset($_SESSION["user"]) && (int)$_SESSION["user"]["admin"] == 1) {
        require("./templates/editBookModal.php"); 
    }



    

