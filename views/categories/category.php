<?php 
    //print_r($books_found); exit;
?>

<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body class="categories-body">

    <?php require("templates/addModal.php"); ?>
    <?php require("templates/mainNav.php");?>
    <?php require("templates/categoriesNav.php");?>

    <main>

        <section id="books-container">
            <?php 

                if(isset($books_found)) {
                    foreach($books_found as $book) {
                        require("templates/book.php");
                    }
                } else {
                    
                    foreach($books as $book) {
    
                        $category = urldecode($url_parts[3]);
                        if($book["category_name"] === $category) {
                            require("templates/book.php");
                        }
                    }
                }

            ?>
        </section>
    </main>
</body>

</html>