<!DOCTYPE html>
<html lang="pt">

<?php require("templates/mainHeader.php");?>

<body>
    
    <?php require("templates/mainNav.php")?>

    <main id="user-data">

        <header>
            <div>
                <h2><span><i class="fas fa-user-tie user-icon"></i></span>Seja Bem-vindo/a <?=$_SESSION["user"]["name"]?></h2>
                <p>Aqui pode ver e/ou alterar os seus dados pessoais</p>
            </div>
            <div>
                <i class="fas fa-pen edit-icon"></i>
            </div>
        </header>
        

       <section class="edit-data">
           
            <div class="user-data-container">

                <div class="change-password-container">
                    <h3>Alterar Password</h3>
                    <form method="POST" action="<?=BASE_PATH."users"?>">
                        <div>
                            <label for="current-password">Insira a password Atual</label>
                            <input type="password" name="current_password" id="current-password" minlength="6" required>
                        </div>
                        <div>
                            <label for="new-password">Insira a nova password</label>
                            <input type="password" name="new_password" id="new-password" minlength="6" required>
                        </div>
                        <div>
                            <label for="rep-new-password">Repita a nova password</label>
                            <input type="password" name="rep_new_password" id="rep-new-password" minlength="6" required>
                            <p class="password-error hide">As passwords não são idênticas...</p>
                        </div>
                        <div>
                            <input type="hidden" name="change_password">
                            <button type="submit">Alterar</button>
                        </div>
                    </form>
                </div>

                <div class="user-data-box">
                    <h3>Altere os seus dados</h3>
                    <div>
                        <div>
                            <span data-name="name">Nome: </span>
                            <p id="name"><?=$_SESSION["user"]["name"]?></p>
                        </div>
                        <button class="edit-field">
                            <i class="fas fa-pen edit-icon"></i>
                        </button>
                    </div>
                    <div>
                        <div>
                            <span data-name="email">Email: </span>
                            <p id="email"><?=$_SESSION["user"]["email"]?></p>
                        </div>
                        <button class="edit-field">
                            <i class="fas fa-pen edit-icon"></i>
                        </button>
                    </div>
                    <div>
                        <div>
                            <span data-name="card_number">Cartão Bertrand: </span>
                            <p id="card"><?=(int)$_SESSION["user"]["card_number"] === 0 ? "Null":$_SESSION["user"]["card_number"] ?></p>
                        </div>
                        <button class="edit-field">
                            <i class="fas fa-pen edit-icon"></i>
                        </button>
                    </div>
                </div>
            </div>

        </section>
    
    </main>



</body>
</html>