<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body class="categories-body">

    <?php require("templates/addModal.php"); ?>
    <?php require("templates/mainNav.php");?>
    <?php require("templates/categoriesNav.php");?>

    <main>
        <section id="ebooks-div">
            <?php 
                foreach($books as $book) {
                    $category = $url_parts[3];
                    if($book["category_name"] === $category) {
                        require("templates/book.php");
                    }
                }
            ?>
        </section>
    </main>
</body>

</html>