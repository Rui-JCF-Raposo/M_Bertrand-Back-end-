<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROJECT - Meu Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="../js/userData.js" defer></script>
</head>
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
                    <form method="POST" action="">
                        <div>
                            <label for="current-password">Insira a password Atual</label>
                            <input type="password" name="current-password" id="current-password">
                        </div>
                        <div>
                            <label for="new-password">Insira a nova password</label>
                            <input type="password" name="new-password" id="new-password">
                        </div>
                        <div>
                            <label for="rep-new-password">Repita a nova password</label>
                            <input type="password" name="rep-new-password" id="rep-new-password">
                        </div>
                        <div>
                            <button type="submit" name="new-password">Alterar</button>
                        </div>
                    </form>
                </div>

                <div class="user-data-box">
                    <h3>Altere os seus dados</h3>
                    <div>
                        <div>
                            <label for="name">Nome: </label>
                            <p id="name"><?=$_SESSION["user"]["name"]?></p>
                        </div>
                        <button class="edit-field">
                            <i class="fas fa-pen edit-icon"></i>
                        </button>
                    </div>
                    <div>
                        <div>
                            <label for="email">Email: </label>
                            <p id="email"><?=$_SESSION["user"]["email"]?></p>
                        </div>
                        <button class="edit-field">
                            <i class="fas fa-pen edit-icon"></i>
                        </button>
                    </div>
                    <div>
                        <div>
                            <label for="card">Cartão Bertrand: </label>
                            <p id="cart"><?=$_SESSION["user"]["card_number"]?></p>
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