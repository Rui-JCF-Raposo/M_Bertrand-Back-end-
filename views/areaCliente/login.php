<!DOCTYPE html>
<html lang="pt">

<?php require("templates/mainHeader.php");?>

<body>
    <main>

        <section id="client-area">
            <header>
                <div class="brand">
                    <img src="logo/book.svg" alt="logo">
                    <div class="brand-name">
                        <h1>MYPROJECT</h1>
                        <h1><span>Livreiros</span></h1>
                    </div>
                </div>
                <div>
                    <a href="<?= BASE_PATH . "home" ?>">
                        <img class="close-icon" src="icons/close.svg" alt="close client area">
                    </a>
                </div>
            </header> <!-- end header -->
            <div class="client-zone">
                <h1 class="welcome-message">Bem-vindo(a) à livraria MYPROJECT, a livraria mais inovadora dos Açores.</h1>
                <div class="client-acess">
                    <div class="login-col-50">
                        <p class="login-title">Entrar na livraria MYPROJECT online</p>
                        <p>Se já está registado ou é leitor MYPROJECT.</p>
                        <form id="Form-login" method="POST" action="<?=BASE_PATH."access/login"?>">
                            <div>
                                <input type="text" name="userEmail" placeholder="email...">
                                <input type="password" name="password" placeholder="password...">
                                <!-- <p class="invalid-message invalid-data login-invalid">Os dados inseridos estão incorretos</p> -->
                            </div>
                            <div>
                                <input type="hidden" name="login_send">
                                <button type="submit" class="login-enter">ENTRAR</button>
                                <button type="button" class="recover-password">RECUPERAR PASSOWORD</button>
                            </div>
                        </form>
                    </div>
                    <div class="register-col-50">
                        <div class="register-container">
                            <div>
                                <p class="register-title">É a sua primeira visita à livraria <br> MYPROJECT online?</p>
                                <p>Registe-se em menos de 1 minuto.</p>
                                <a href="<?= BASE_PATH . "register" ?>"><button class="registerBtn">REGISTAR</button></a>
                            </div>
                            <div class="security-info">
                                <p>Segurança</p>
                                <p>Garantimos a segurança e confidencialidade dos seus dados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end client zone -->
            <div class="client-help">
                <a href="#">
                    <img src="icons/help.svg" alt="client help icon">
                    <span>AJUDA</span>
                </a>
            </div>
        </section>
    </main>
</body>

</html>