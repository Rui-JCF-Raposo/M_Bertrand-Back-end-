<?php 
     
    $categoryActiveSate = "active-category";

?>

<aside id="categories" class="categories-col-10">

    <div class="books-by-lang">
        <a href="#">
            <h1>LIVROS</h1>
        </a>
        <ul>
            <?php foreach($categories as $category) { if((int)$category["active"] === 1) {?>
                <li>
                    <a 
                        href="<?=BASE_PATH."books/".$category["category_name"]?>" 
                        class="<?= $url_parts[3] == $category["category_name"] ? "active-category":"" ?>">
                        <?=ucfirst($category["category_name"])?>
                    </a>
            </li>
            <?php } } ?>
        </ul>
    </div>

    <?php if(!isset($_SESSION["user"])) { ?>
        <div class="login-to-acess">
            <span>Entre para ter acesso total</span>
            <a href="<?= BASE_PATH . "login" ?>"><button>ENTRAR</button></a>
        </div>
    <?php } ?>

</aside> <!-- end categories section -->


<section class="categories-responsive">
    <div class="hamburguer-menu">
        <div></div>
        <div></div>
        <div></div>
    </div>
</section>