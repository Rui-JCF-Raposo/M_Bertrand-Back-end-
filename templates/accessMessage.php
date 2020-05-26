<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/main.css">    
    <link rel="stylesheet" href="../css/checkOut.css">    
</head>
<body id="success-order">
    <div class="message">
        <div class="brand-col-10">
            <div class="brand">
                <img src="../logo/book.svg" alt="logo">
                <div class="brand-name">
                    <h1>MYPROJECT</h1>
                    <h1><span>Livreiros</span></h1>
                </div>
            </div>
        </div>
        <div>
            <h2>A validação falhou</h2>
        </div>
        <div>
        <?php if(isset($login_failed)) { ?>
            <a href="<?=BASE_PATH."login"?>">
                <button>Voltar a fazer login</button>
            </a>
        <?php } else if(isset($register_failed)) { ?>
            <a href="<?=BASE_PATH."register"?>">
                <button>Voltar ao registo</button>
            </a>
        <?php } ?>
        </div>
    </div>
</body>
</html>