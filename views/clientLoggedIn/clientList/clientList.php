<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MYPROJECT Livreiros</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../css/main.css">
  <link rel="stylesheet" href="../../../css/clientHomePage.css">
  <link rel="stylesheet" href="../../../css/clientList.css">
  <link rel="stylesheet" href="../../../css/shoppingCart.css">
  <script src="../../../js/app.js" defer></script>
  <script src="../../../js/clientHomePage.js" defer></script>
  <script src="../../../js/clientList.js" defer></script>
</head>

<body>

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
            <li><a href="../clientHomePage.html">Área de Cliente</a></li>
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
          <img src="../../../icons/wishlist.svg" alt="wish list" class="menu-icon">
          LISTA
        </li>
      </ul>
    </div> <!-- end nav-menu -->
  </nav> <!-- end nav -->

  <aside id="categories" class="categories-col-10">

    <div class="books-by-lang">
      <a href="#">
        <h1>LIVROS</h1>
      </a>
      <ul>
        <li><a href="../../categories/loggedIn/categoriesSpanish.html">EM ESPANHOL</a></li>
        <hr class="categories-hr">
        <li><a href="../../categories/loggedIn/categoriesEnglish.html">EM INGLÊS</a></li>
        <hr class="categories-hr">
        <li><a href="../../categories/loggedIn/categoriesFrench.html">EM FRANÇÊS</a></li>
      </ul>
    </div>

    <div class="ebooks">
      <a href="../../categories/loggedIn/categoriesEBooks.html">
        <h1>EBOOKS</h1>
      </a>
    </div>

    <div class="school-books">
      <a href="../../categories/loggedIn/categoriesTextBooks.html">
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
    <div class="clientList-showcase"></div>
    <section id="client-list">
      <div class="container">
        <p class="clientList-info">Estas são as suas listas de desejos, use e abuse. Adiciones-lhe os seus preferidos,
          os indispensáveis, os essenciais , os desejados e partilhe-as com os seus amigos e família nas datas
          especiais. Descubra <a href="#">como criar e gerir listas de desejos</a>. <b>Quando queremos muito um livro,
            ele acontece.</b></p>
        <div class="createNewList">
          <button class="create-list-btn">CRIAR NOVA LISTA</button>
          <img src="../../../icons/wishlist.svg" alt="wish list icon">
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