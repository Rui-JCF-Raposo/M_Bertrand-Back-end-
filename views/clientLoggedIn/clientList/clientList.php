<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body>
    
    <?php require("templates/mainNav.php"); ?>
    <?php require("templates/categoriesNav.php"); ?>

    <main>
        <div class="clientList-showcase"></div>
        <section id="client-list">
            <div class="container">
                <p class="clientList-info">Estas são as suas listas de desejos, use e abuse. Adiciones-lhe os seus preferidos,
                    os indispensáveis, os essenciais , os desejados e partilhe-as com os seus amigos e família nas datas
                    especiais. Descubra <a href="#">como criar e gerir listas de desejos</a>. <b>Quando queremos muito um livro,
                        ele acontece.</b></p>
                <div class="createNewList">
                    <button class="create-list-btn">CRIAR NOVA LISTA</button>
                    <img src="icons/wishlist.svg" alt="wish list icon">
                </div>
                <div id="clientLists">
                    <div class="test-list">

                        <div class="list-books"></div>
                    </div>
                </div> <!-- end test list -->
            </div> <!-- end client lists -->
            </div> <!-- end container -->
        </section>
    </main>
</body>
<div class="shop-script-container">

</div>

</html>