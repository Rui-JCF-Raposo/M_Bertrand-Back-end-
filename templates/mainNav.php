<nav>
    <div class="brand-col-10">
        <div class="brand">
            <img src="logo/book.svg" alt="logo">
            <div class="brand-name">
                <h1>MYPROJECT</h1>
                <h1><span>Livreiros</span></h1>
            </div>
        </div>
    </div>
    <!--end brand col -->
    <div class="search-col-70">
        <input type="text" name="search" placeholder="Pesquisar">
        <img src="icons/search.svg" alt="search icon">
    </div> <!-- end search col -->
    <div class="nav-menu-col-20">
        <ul>
            <li class="menu-cliente">
                <img src="icons/avatar.svg" alt="user" class="menu-icon">
                CLIENTE
                <ul class="cliente-dropdown menu-dropdown">
                    <li class="cliente-login">
                        <a href="<?= BASE_PATH . "home/areaCliente" ?>">
                            <img src="icons/user-login.svg" alt="user login">
                            <p>LOGIN</p>
                        </a>
                    </li>
                    <hr class="menu-hr">
                    <li><a href="<?= BASE_PATH . "home/areaCliente" ?>">Área de Cliente</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Lista de Desejos</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Ajuda</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Novo Registo</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Dados Pessoais</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Encomendas</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Trocas e Devoluçoes</a></li>
                    <hr class="menu-hr">
                    <li><a href="#">Cartão Leitor Bertrand</a></li>
                </ul>
            </li>
            <li class="menu-ajuda">
                <img src="icons/information.svg" alt="help" class="menu-icon">
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
                <img src="icons/shop.svg" alt="libraries" class="menu-icon">
                LIVRARIAS
            </li>
            <li class="menu-cesto">
                <img src="icons/shopping-cart.svg" alt="shop-cart" class="menu-icon">
                CESTO
                <ul class="cesto-dropdown menu-dropdown">
                    <li>O cesto de compras está vazio</li>
                </ul>
            </li>
            <li class="menu-list">
                <img src="icons/wishlist.svg" alt="wish list" class="menu-icon">
                LISTA
            </li>
        </ul>
    </div> <!-- end nav-menu -->
</nav> <!-- end nav -->