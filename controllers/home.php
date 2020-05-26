<?php
    require("models/book.php");
    $booksModel = new Book();
    
    $books = $booksModel->getBooks();
    $categories = $booksModel->getCategories();

    require("views/home.php"); 

