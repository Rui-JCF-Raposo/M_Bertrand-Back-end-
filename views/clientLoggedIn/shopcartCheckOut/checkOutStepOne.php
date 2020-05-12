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
  <link rel="stylesheet" href="../../../css/clientHomePage.css">
  <link rel="stylesheet" href="../../../css/main.css">
  <link rel="stylesheet" href="../../../css/shoppingCart.css">
  <link rel="stylesheet" href="../../../css/checkOut.css">
  <script src="../../../js/app.js" defer></script>
  <script src="../../../js/clientHomePage.js" defer></script>
  <script src="../../../js/shoppingCart.js" defer></script>
  <script src="../../../js/checkOut.js" defer></script>
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
          <a href="../../clientLoggedIn/clientList/clientList.html">
            <img src="../../../icons/wishlist.svg" alt="wish list" class="menu-icon">
            LISTA
          </a>
        </li>
      </ul>
    </div> <!-- end nav-menu -->
  </nav> <!-- end nav -->
  <main id="checkOutPages">
    
    <header class="checkOutSteps">
        <div class="cest-step separateSteps activeStep">
            <a href="#">
                CESTO
            </a>
        </div>
        <div class="order-data-step separateSteps">
            <a href="#">
                DADOS DE ENCOMENDA
            </a>
        </div>
        <div class="confirm-steps separateSteps">
            <a href="#">CONFIRMAÇÃO</a>
        </div>
    </header>

    <section id="checkOut-products-info">
        <div class="container">
            <header>
                <div>
                    <img src="../../../icons/clientLoggenIn_Icons/checkOut/exclamation-mark.svg" alt="warning icon">
                </div>
                <div>
                    <span>Importante</span>
                    <span>Os produtos assinalados a vermelho sofreram alterações no preço e/ou desconto.</span>
                </div>
            </header>
            <table class="checkOut-table">
              <thead>
                <tr>
                  <th>PRODUTO</th>
                  <th>QUANTIDADE</th>
                  <th>PREÇO</th>
                </tr>
              </thead>
              <tbody class="checkOut-products-output"></tbody>
            </table>
            <div class="checkOut-deliver-conditions">
                <div class="sell-conditions">
                  <a href="#">
                    Consultar condições gerais de venda
                  </a>
                </div>
                <div class="iva-info">
                  Preços em Euros (IVA incluído). Se inferiores ao Preço de Editor, este é rasurado.
                </div>
                <div class="deliver-time-details">
                  Prazo previsto para envio da encomenda (dias úteis): Envio em 24 horas
                </div>
            </div>
            <button type="button" class="avanceBtn registerBtn continue-to-order">Continuar</button>
            <div class="clearfix"></div>
        </div>
    </section>

  </main>
</body>

</html>