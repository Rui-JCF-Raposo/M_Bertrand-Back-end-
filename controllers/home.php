<?php
    require("models/book.php");
    $booksModel = new Book();
    
    $books = $booksModel->getBooks();
    $categories = $booksModel->getCategories();

    $_SESSION["total_books"] = count($books);

    require("views/home.php"); 

