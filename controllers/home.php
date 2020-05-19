<?php
    require("models/book.php");
    $booksModel = new Book();
    $categories = $booksModel->getCategories();

    require("views/home.php"); 

