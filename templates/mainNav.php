<?php
    $pathFix = isset($url_parts[3]) ? "../" : "";
    if(isset($url_parts[4])) {
        $pathFix = "../../";
    }
    
    $shopcartTotalItems = 0;
    if(isset($_SESSION["shopcart_books"])) {
        foreach($_SESSION["shopcart_books"] as $book) {
           $shopcartTotalItems += $book["quantity"];
        }
    }
?>
<nav>
    <div class="brand-col-10">
        <div class="brand">
            <img src="<?= $pathFix ?>logo/book.svg" alt="logo">
            <div class="brand-name">
                <h1>MYPROJECT</h1>
                <h1><span>Livreiros</span></h1>
            </div>
        </div>
    </div>
    <!--end brand col -->
    <div class="search-col-70">
        <input type="text" name="search" placeholder="Pesquisar">
        <img src="<?= $pathFix ?>icons/search.svg" alt="search icon">
    </div> <!-- end search col -->
    <div class="nav-menu-col-20">
        <ul>
            <li class="menu-cliente">
                <img src="<?= $pathFix ?>icons/avatar.svg" alt="user" class="menu-icon">
                CLIENTE
                <ul class="cliente-dropdown menu-dropdown">
                    <li class="cliente-login">
                        <?php if (!isset($_SESSION["user"])) { ?>
                            <a href="<?= BASE_PATH . "login" ?>">
                                <img src="<?= $pathFix ?>icons/user-login.svg" alt="user login">
                                <p>LOGIN</p>
                            </a>
                        <?php } else { ?>
                            <a href="<?= BASE_PATH . "access/logout" ?>">
                                <img src="<?= $pathFix ?>icons/sign-out-alt-solid.svg" alt="user logout">
                                <p>LOGOUT</p>
                            </a>
                        <?php }  ?>
                    </li>
                    <hr class="menu-hr">
                    <li><a href="<?= BASE_PATH . "dashboard" ?>">Área de Cliente</a></li>
                    <?php if( isset($_SESSION["user"]) && (int)$_SESSION["user"]["admin"] === 1 ) { ?>
                        <hr class="menu-hr">
                        <li><a href="<?= BASE_PATH . "admin" ?>">Área Administrativa</a></li>
                    <?php  } ?>
                    <hr class="menu-hr">
                    <li><a href="<?=BASE_PATH."wishlists"?>">Lista de Desejos</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Ajuda</a></li>
                    <hr class="menu-hr">
                    <li><a href="<?=BASE_PATH."users/userData"?>">Dados Pessoais</a></li>
                    <hr class="menu-hr">
                    <li><a href="<?=BASE_PATH."orders"?>">Encomendas</a></li>
                </ul>
            </li>
            <li class="menu-ajuda">
                <img src="<?= $pathFix ?>icons/information.svg" alt="help" class="menu-icon">
                AJUDA
                <ul class="ajuda-dropdown menu-dropdown">
                    <li><a href="@">Livrarias Online</a></li>
                    <hr class="menu-hr">
                    <li><a href="@">Livrarias</a></li>
                    <hr class="menu-hr">
                    <li><a href="@">Livros Escolares</a></li>
                    <hr class="menu-hr">
                    <li><a href="@">Manuais Escolares Gratuitos</a></li>
                    <hr class="menu-hr">
                    <li><a href="@">Afiliados</a></li>
                </ul>
            </li>
            <li class="menu-livrarias">
                <img src="<?= $pathFix ?>icons/shop.svg" alt="libraries" class="menu-icon">
                LIVRARIAS
            </li>
            <li class="menu-cesto">
                 <div class="shopcart-items-quantitiy"><?=$shopcartTotalItems?></div>
                <img src="<?= $pathFix ?>icons/shopping-cart.svg" alt="shop-cart" class="menu-icon">
                CESTO
                <ul class="cesto-dropdown menu-dropdown">
                <li class="chest-state <?=isset($_SESSION["shopcart_books"]) ? "hide":""?>">O cesto de compras está vazio</li>
                    <li class="shopcart-container <?=!isset($_SESSION["shopcart_books"]) ? "hide":""?>">
                        <?php if(isset($_SESSION["shopcart_books"])) { 
                            foreach($_SESSION["shopcart_books"] as $book) { 
                                require("templates/shopcartBookBox.php");
                            } 
                        } ?>
                    </li>
                    <li class="shopcart-checkout">
                        <?php if(isset($_SESSION["shopcart_books"])) {
                                //require("templates/shopcartFooter.php");
                            } 
                        ?>
                    </li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="<?= BASE_PATH . "wishlists" ?>">
                    <img src="<?= $pathFix ?>icons/wishlist.svg" alt="wish list" class="menu-icon">
                    LISTA
                </a>
            </li>
        </ul>
    </div> <!-- end nav-menu -->
</nav> <!-- end nav -->