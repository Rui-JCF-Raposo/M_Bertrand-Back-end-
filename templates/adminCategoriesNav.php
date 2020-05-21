<?php 

    if(isset($url_parts[3])) {
        
        $booksActiveSate = "";
        $usersActiveSate = "";
        $ordersActiveSate = "";

    
        $category = $url_parts[3];
    
        switch($category) {
            case "booksManaging": $booksActiveSate = "active-category"; break;
            case "usersManaging": $usersActiveSate = "active-category"; break;
            case "ordersManaging": $ordersActiveSate = "active-category"; break;
        }

    }

?>

<aside id="categories" class="categories-col-10">

    <div class="books-by-lang">
        <a href="#">
            <h1>Administração</h1>
        </a>
        <ul>
            <li><a href="<?=BASE_PATH."admin/booksManaging"?>" class="<?=$booksActiveSate?>">Livros</a></li>
            <hr class="categories-hr">
            <li><a href="<?=BASE_PATH."admin/usersManaging"?>" class="<?=$usersActiveSate?>">Utilizadores</a></li>
        </ul>
    </div>

</aside> <!-- end categories section -->


<section class="categories-responsive">
    <div class="hamburguer-menu">
        <div></div>
        <div></div>
        <div></div>
    </div>
</section>