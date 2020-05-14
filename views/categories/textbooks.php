<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body class="categories-body">


    <!-- replace and require modal template ---------------------- -->
    <div class="add-modal d-none">
        <div class="add-to-list-modal">
            <header>
                <div class="brand">
                    <img src="../../../logo/book.svg" alt="logo">
                    <div class="brand-name">
                        <h1>MYPROJECT</h1>
                        <h1><span>Livreiros</span></h1>
                    </div>
                </div>
                <div>
                    <a href="#" class="close-add-modal">
                        <img class="close-icon" src="../../../icons/close.svg" alt="close client area">
                    </a>
                </div>
            </header> <!-- end header -->
            <div class="modal-info">
                <img src="../../../icons/clientLoggenIn_Icons/wish-list.svg" alt="">
                <h1>ADICIONAR À LISTA DE DEJOS</h1>
            </div>
            <div class="userLists">
                <button class="list-item-btn">A minha lista</button>
            </div>
            <button class="create-new-list">CRIAR NOVA LISTA</button>
        </div>
    </div>

     <!-- replace and require mainNav template ---------------------- -->
     <?php require("templates/mainNav.php");?>

    <!-- replace and require categories Nav Template ---------------------- -->
    <?php require("templates/categoriesNav.php");?>
    <main>
        <!-- Make Foreach to display books from db table books (require template/book)-->
        <section id="text-books"></section>
    </main>
</body>

</html>