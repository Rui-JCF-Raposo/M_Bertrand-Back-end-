<?php 

    if(isset($url_parts[5])) {
        
        $healthActiveSate = "";
        $itActiveSate = "";
        $psychologyActiveSate = "";
        $ebooksActiveSate = "";
        $textbooksActiveSate = "";
    
        $category = $url_parts[5];
    
        switch($category) {
            case "health": $healthActiveSate = "active-category"; break;
            case "it": $itActiveSate = "active-category"; break;
            case "psychology": $psychologyActiveSate = "active-category"; break;
            case "ebooks": $ebooksActiveSate = "active-category"; break;
            case "textbooks": $textbooksActiveSate = "active-category"; break;
        }

    }

?>

<aside id="categories" class="categories-col-10">

    <div class="books-by-lang">
        <a href="#">
            <h1>LIVROS</h1>
        </a>
        <ul>
            <li><a href="<?=BASE_PATH."books/health"?>" class="<?=$healthActiveSate?>">Saúde</a></li>
            <hr class="categories-hr">
            <li><a href="<?=BASE_PATH."books/it"?>" class="<?=$itActiveSate?>">IT</a></li>
            <hr class="categories-hr">
            <li><a href="<?=BASE_PATH."books/psychology"?>" class="<?=$psychologyActiveSate?>">Psicologia</a></li>
        </ul>
    </div>

    <div class="ebooks">
        <a href="<?=BASE_PATH."books/ebooks"?>" class="<?=$ebooksActiveSate?>">
            <h1>EBOOKS</h1>
        </a>
    </div>

    <div class="school-books">
        <a href="<?=BASE_PATH."books/textbooks"?>" class="<?=$textbooksActiveSate?>">
            <h1>LIVROS ESCOLARES</h1>
        </a>
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