<?php
if (isset($url_parts[2])) {
    switch ($url_parts[2]) {
        case "": $title = "Página Inicial"; break;
        case "home": $title = "Página Inicial"; break;
        case "login": $title = "Login"; break;
        case "register": $title = "Registo"; break;
        case "dashboard": $title = "Área de Cliente"; break;
        case "wishlists": $title = "Listas de Desejos"; break;
        case "checkout": $title = "Encomendar"; break;
        case "admin": $title = "Área administrativa"; break;
        case "orders": $title = "Encomendas"; break;
    }
}

if (isset($url_parts[3])) {
    switch ($url_parts[3]) {
        case "userData": $title = "Dados Pessoais"; break;
    }
}

if (isset($url_parts[3]) && $url_parts[2] === "books") {
    $category = $url_parts[3];
    $title = ucfirst($category);
}

$pathFix = isset($url_parts[3]) ? "../" : "";
if(isset($url_parts[4])) {
    $pathFix = "../../";
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYPROJECT - <?= $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $pathFix ?>css/main.css">
    <link rel="stylesheet" href="<?= $pathFix ?>css/shoppingCart.css">
    <script src="<?= $pathFix ?>js/shoppingCart.js" defer></script>
    <?php if (
            $controller !== "home" && 
            $controller !== "login" && 
            $controller !== "register" && 
            $controller !== "orders" && 
            $controller !== "users") { 
    ?>
        <link rel="stylesheet" href="<?= $pathFix ?>css/clientHomePage.css">
        <link rel="stylesheet" href="<?= $pathFix ?>css/clientList.css">
        <script src="<?= $pathFix ?>js/clientHomePage.js" defer></script>
    <?php } ?>
    <?php if ($controller === "login") { ?>
        <script src="js/login.js" defer></script>
    <?php } ?>
    <?php if ($controller === "register") { ?>
        <script src="js/register.js" defer></script>
        <link rel="stylesheet" href="css/registerArea.css">
    <?php } ?>
    <?php if ($controller === "register" || $controller === "login") { ?>
        <link rel="stylesheet" href="<?= $pathFix ?>css/clientArea.css">
    <?php } ?>
    <?php if ($controller === "checkout") { ?>
        <link rel="stylesheet" href="<?= $pathFix ?>css/checkOut.css">
        <script src="<?= $pathFix ?>js/checkOut.js" defer></script>
    <?php } ?>
    <?php if ($controller === "admin") { ?>
        <link rel="stylesheet" href="<?= $pathFix ?>css/admin.css">
        <script src="<?= $pathFix ?>js/admin.js" defer></script>
    <?php } ?>
    <?php if ($controller === "orders" || $controller === "admin") { ?>
        <link rel="stylesheet" href="<?= $pathFix ?>css/checkOut.css">
        <script src="<?=$pathFix?>js/orders.js" defer></script>
    <?php } else if ($controller === "users") { ?>
        <script src="<?=$pathFix?>js/userData.js" defer></script>
    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="<?= $pathFix ?>js/shoppingCart.js" defer></script>
    <script src="<?= $pathFix ?>js/clientList.js" defer></script>
    <script src="<?= $pathFix ?>js/app.js" defer></script>
</head>