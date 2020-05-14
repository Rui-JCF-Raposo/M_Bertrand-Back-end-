<?php
    session_start();
    
    class ShoppcartSession {
        
        function addBookToSession($bookToAdd) {
            $books = $bookToAdd;
            if(isset($_SESSION["books"])) {
                foreach(json_decode($_SESSION["books"]) as $book) {
                    $books[] = $book;
                } 
            }
            $_SESSION["books"] = json_encode($books);
        }
    
       function getBooksFromSession() {
            $books = [];
            foreach($_SESSION["shopcart_books"] as $book) {
                $books[] = $book;
            }
            return json_encode($books);
        }
    
       function removeBookFromSession($id) {
            $books = [];
            foreach($_SESSION["shopcart_books"] as $book) {
                if($book["book_id"] !== $id) {
                    $books[] = $book;
                }
            }
            $_SESSION["shopcart_books"] = $books;
        }
    
       function addShopcartBookQuantity($id) {
            $books = [];
            foreach($_SESSION["shopcart_books"] as $book) {
                if($book["book_id"] == $id) {
                    $book["quantity"]++;
                }
                $books[] = $book;
            }
            $_SESSION["shopcart_books"] = $books;
        }
    
       function removeShopcartBookQuantity($id) {
            $books = [];
            foreach($_SESSION["shopcart_books"] as $book) {
                if($book["book_id"] == $id && $book["quantity"] > 0) {
                    $book["quantity"]--;
                }
                $books[] = $book;
            }
            $_SESSION["shopcart_books"] = $books;
        }

        function checkSchopcartRepetitions($book) {
            foreach($_SESSION["shopcart_books"] as $cartBook) {
                if($cartBook["book_id"] === $book["book_id"]) {
                    return true;
                }
            }
            return false;
        }
    }