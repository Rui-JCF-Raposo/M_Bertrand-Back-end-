<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body class="categories-body">


    <?php require("templates/addModal.php"); ?>
    <?php require("templates/mainNav.php"); ?>
    <?php require("templates/categoriesNav.php"); ?>

    <main>
        <!-- Make Foreach to display books from db table books (require template/book)-->
        <section id="it-books">
            <?php 
                foreach($books as $book) {
                    if($book["category_name"] === "it") {
                        require("templates/book.php");
                    }
                }
            ?>
        </section>
    </main>
</body>

</html>