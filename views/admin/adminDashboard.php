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
        </div>
    </main>
</body>
</html>