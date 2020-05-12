<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/clientArea.css">
  <link rel="stylesheet" href="../css/registerArea.css">
  <script src="../js/register.js" defer></script>
</head>

<body>
  <main>
    <section id="register-area">
      <header>
        <div class="brand">
          <img src="../logo/book.svg" alt="logo">
          <div class="brand-name">
            <h1>MYPROJECT</h1>
            <h1><span>Livreiros</span></h1>
          </div>
        </div>
        <div>
          <a href="../areaCliente/areaclienteLogin.html">
            <img class="close-icon" src="../icons/close.svg" alt="close client area">
          </a>
        </div>
      </header> <!-- end header -->
      <div id="register">
        <div class="register-info">
          <h1>NOVO REGISTO</h1>
          <div class="register-sections">
            <span class="register-section-active">1</span>
            <span>2</span>
          </div>
        </div> <!-- end register info -->
        <form id="Form-register" method="GET" action="../clientLoggedIn/clientHomePage.html">
          <div class="register-step-1">
            <input type="text" name="email" placeholder="email" required>
            <div class="invalid-fields">
              <p class="invalid-message empty-email">Por favor, para avançar, indique o seu email.</p>
              <p class="invalid-message invalid-email">Verifique, por favor, o endereço de email introduzido.</p>
              <p class="invalid-message existing-email">Este email já foi registado</p>

            </div>
            <input type="text" name="readerCardNumber" placeholder="número de Cartão Leitor MYPROJECT(facultativo)">
            <div class="info-icon">
              <img src="../icons/info-button.svg" alt="info icon">
            </div>
            <div class="info-box">
                <img src="../icons/info-button.svg" alt="">
                <p>
                  Se já é Leitor <b>MYPROJECT</b>, insira aqui o seu número para poder beneficiar de todas as vantagens e
                  utilizar o seu saldo na MYPROJECT online.
                  <br>
                  <br>
                  Deverá indicar o email que utilizou para:
                  <br>
                  - Registar-se em MYPROJECT.pt
                  - Aderir ao Cartão Leitor MYPROJECT nas nossas livrarias
                  - Fazer compras, e acumular saldo, nas nossas livrarias
                </p>
            </div>
          <button type="button" class="avanceBtn registerBtn">Avançar</button>
          </div>
          <div class="register-step-2">
              <p>Defina a sua password de acesso</p>
              <div>
                <input type="text" name="userName" placeholder="nome">
                <p class="invalid-message empty-name">Por favor, para avançar, indique o seu nome. <span></span></p>
                <input type="password" name="password" placeholder="password">
                <p class="invalid-message empty-password">Por favor, para avançar, indique uma password. <span></span></p>
                <input type="password" name="passwordConfirm" placeholder="confirmar password">
                <p class="invalid-message empty-password-2">Por favor, para avançar, confirme a passord. <span></span></p>
                <p class="invalid-message password-dont-match">As passwords não são idênticas. <span></span></p>
                <div class="termsAndConditions">
                  <input type="checkbox" name="termsAndConditions">
                  <a  href="#" alt="terms and conditions">Li e aceito as condições gerais de venda.</a>
                </div>
                <p class="invalid-message termsAndConditions-conirm">Tem de aceitar os nossos termos & condições</p>
              </div>
              <button type="submit" class="registerBtn">REGISTAR</button>
            </div>
        </form>

      </div> <!-- end register -->
    </section>
  </main>
</body>

</html>