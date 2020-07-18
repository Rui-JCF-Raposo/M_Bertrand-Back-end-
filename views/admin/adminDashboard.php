<!DOCTYPE html>
<html lang="pt">

<?php require("templates/mainHeader.php");?>

<body class="admin-zone">
   
    <?php require("templates/adminMainNav.php"); ?>
    <?php require("templates/adminCategoriesNav.php"); ?>

    <main class="dashboard-main">
        <h1>Admin Dashboard</h1>
        <div class="dashboard-stats">
            <div>
                <h2>Livros</h2>
                <p><?=$_SESSION["total_books"]?></p>
            </div>
            <div>
                <h2>Utilizadores</h2>
                <p><?=$_SESSION["total_users"]?></p>
            </div>
            <div>
                <h2>Total de Encomendas</h2>
                <p><?=$total_orders?></p>
            </div>
            <div>
                <h2>Encomendas Entregues</h2>
                <p><?=$orders_delivered?></p>
            </div>
            <div>
                <h2>Encomendas Pendentes</h2>
                <p><?=$pending_orders?></p>
            </div>
            <div>
                <h2>Livros Vendidos</h2>
                <p><?=$books_sold?></p>
            </div>
            <div>
                <h2>Lucros</h2>
                <p><?=$total_profits?>  &euro;</p>
            </div>
        </div>
    </main>
</body>
</html>