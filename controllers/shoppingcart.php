<?php

    require("../models/shoppcartSession.php");
    $shoppcartModel = new ShoppcartSession();


    if(isset($_GET["addBook"])) {
        $book = json_decode(file_get_contents("php://input"), true);
        session_start();
        $repetition = $shoppcartModel->checkSchopcartRepetitions($book);
        if($repetition) {
            exit;
        }
        if(isset($_SESSION["shopcart_books"])) {
            $books =  $_SESSION["shopcart_books"];
        } 
        $books[] = $book;
        $_SESSION["shopcart_books"] = $books;
        print_r($_SESSION["shopcart_books"]);
    }

    if(isset($_GET["getSession"])) {
        $books = $shoppcartModel->getBooksFromSession();
        echo $books;
    }

    if(isset($_GET["sessionRemove"])) {
        $shoppcartModel->removeBookFromSession($_GET["id"]);
        echo "Session remove worked";
    }

    if(isset($_GET["updateSession"])) {
        if($_GET["quantity"] === "add") {
            $shoppcartModel->addShopcartBookQuantity($_GET["id"]);
        } else if($_GET["quantity"] === "remove") {
            $shoppcartModel->removeShopcartBookQuantity($_GET["id"]);
        }
    }


    //http://localhost/M_Bertrand-Back-end-/controllers/shoppingcart.php?updateSession&quantity=add&id=39

    //http://localhost/controllers/shoppingcart.php?updateSession&quantity=remove&id=39
    
    