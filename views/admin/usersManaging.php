<!DOCTYPE html>
<html lang="pt">
    
    <?php require("templates/mainHeader.php"); ?>

<body class="admin-zone">
    
    <?php require("templates/adminMainNav.php"); ?> 
    <?php require("templates/adminCategoriesNav.php"); ?>
    
    <main>
        
        <h1>Users Managing</h1>

        <section id="users-info">
            <?php foreach($users as $user) { 
            ?>
                <div class="user-box" data-userId="<?=$user["user_id"]?>">
                    <div>
                        <h2><?=$user["name"]?> <span><?=(int)$user["admin"] === 1 ? "(Administrador)":"" ?></span></h2>
                        <p><?=$user["email"]?></p>
                    </div>
                    <div class="user-options">
                        <form method="POST" action="<?=BASE_PATH."admin/usersManaging"?>">
                            <input type="hidden" name="user_id" value="<?=$user["user_id"]?>">
                            <button type="submit" name="send-message-user" class="send-message-user">Enviar Mensagem</button>
                        </form>
                        <form method="POST" action="<?=BASE_PATH."admin/usersManaging"?>">
                            <input type="hidden" name="user_id" value="<?=$user["user_id"]?>">
                             <?php if((int)$user["active"] === 1) { ?>
                                <button type="submit" name="block-user" class="block-user">Bloquear</button>
                            <?php } else { ?>
                                <button type="submit" name="unblock-user" class="unblock-user">Desbloquear</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </section>

    
    </main>



</body>
</html>