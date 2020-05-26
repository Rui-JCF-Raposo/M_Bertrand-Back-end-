<?php
    $pathFix = isset($url_parts[3]) ? "../" : "";
    
?>

<nav id="admin-main-nav">
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
                <div>
                    ADMIN
                </div>
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
                    <li><a href="<?= BASE_PATH . "admin" ?>">Área Adminstrativa</a></li>
                    <hr class="menu-hr">
                    <li><a href="<?= BASE_PATH . "home" ?>">Área Pública</a></li>
                    <hr class="menu-hr">
                    <li><a href="<?= BASE_PATH . "users/userData" ?>">Dados Pessoais</a></li>
                </ul>
            </li>
            <li class="menu-ajuda">
                <img src="<?= $pathFix ?>icons/information.svg" alt="help" class="menu-icon">
                <div>
                    AJUDA
                </div>
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
                <div>
                    LIVRARIAS
                </div>
            </li>
        </ul>
    </div> <!-- end nav-menu -->
</nav> <!-- end nav -->