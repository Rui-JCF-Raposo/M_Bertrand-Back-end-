<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYPROJECT Livreiros</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/clientArea.css">
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/clientHomePage.css">
    <link rel="stylesheet" href="../../../css/shoppingCart.css">
    <script src="../../../js/app.js" defer></script>
    <script src="../../../js/clientHomePage.js" defer></script>
    <script src="../../../js/shoppingCart.js" defer></script>
</head>

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
    <nav>
        <div class="brand-col-10">
            <div class="brand">
                <img src="../../../logo/book.svg" alt="logo">
                <div class="brand-name">
                    <h1>MYPROJECT</h1>
                    <h1><span>Livreiros</span></h1>
                </div>
            </div>
        </div>
        <!--end brand col -->
        <div class="search-col-70">
            <input type="text" name="search" placeholder="Pesquisar">
            <img src="../../../icons/search.svg" alt="search icon">
        </div> <!-- end search col -->
        <div class="nav-menu-col-20">
            <ul>
                <li class="menu-cliente">
                    <img src="../../../icons/avatar.svg" alt="user" class="menu-icon">
                    CLIENTE
                    <div class="p-relative">
                        <div class="login-confirm-icon">
                            <img src="../../../icons/checkmark.svg" alt="checkmark login">
                        </div>
                    </div>
                    <ul class="cliente-dropdown menu-dropdown">
                        <li class="welcome-user"></li>
                        <hr class="menu-hr">
                        <li><a href="../../clientLoggedIn/clientHomePage.html">Área de Cliente</a></li>
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
                        <li class="cliente-login">
                            <a href="../../../index.html">
                                <img src="../../../icons/user-login.svg" alt="user login">
                                <p>LOGOUT</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-ajuda">
                    <img src="../../../icons/information.svg" alt="help" class="menu-icon">
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
                    <img src="../../../icons/shop.svg" alt="libraries" class="menu-icon">
                    LIVRARIAS
                </li>
                <li class="menu-cesto">
                    <img src="../../../icons/shopping-cart.svg" alt="shop-cart" class="menu-icon">
                    CESTO
                    <span class="shopcart-items-quantity">0</span>
                    <ul class="cesto-dropdown menu-dropdown">
                        <li class="shopcart-container">O cesto de compras está vazio</li>
                        <li class="shopcart-checkout"></li>
                    </ul>
                </li>
                <li class="menu-list">
                    <a href="../../clientLoggedIn/clientList/clientList.html">
                        <img src="../../../icons/wishlist.svg" alt="wish list" class="menu-icon">
                        LISTA
                    </a>
                </li>
            </ul>
        </div> <!-- end nav-menu -->
    </nav> <!-- end nav -->

    <!-- replace and require categories Nav Template ---------------------- -->
    <aside id="categories" class="categories-col-10">

        <div class="books-by-lang">
            <a href="#">
                <h1>LIVROS</h1>
            </a>
            <ul>
                <li><a href="../loggedIn/categoriesSpanish.html"><strong class="active-category">EM ESPANHOL</strong></a></li>
                <hr class="categories-hr">
                <li><a href="../loggedIn/categoriesEnglish.html">EM INGLÊS</a></li>
                <hr class="categories-hr">
                <li><a href="../loggedIn/categoriesFrench.html">EM FRANÇÊS</a></li>
            </ul>
        </div>

        <div class="ebooks">
            <a href="../loggedIn/categoriesEBooks.html">
                <h1>EBOOKS</h1>
            </a>
        </div>

        <div class="school-books">
            <a href="../loggedIn/categoriesTextBooks.html">
                <h1>LIVROS ESCOLARES</h1>
            </a>
        </div>

    </aside> <!-- end categories section -->

    <section class="categories-responsive">
        <div class="hamburguer-menu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>CATEGORIES</h1>
    </section>

    <main>
        <!-- Make Foreach to display books from db table books (require template/book)-->
        <section id="spanish-books"></section>
    </main>
</body>

</html>