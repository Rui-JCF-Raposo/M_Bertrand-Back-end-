<?php 
    $controller = $url_parts[2];
?>
<?php if(isset($book)) { ?>
    <div class="book-box" data-id="<?=$book["book_id"]?>">
        <div class="book-img-wrapper">
            <img class="book-image" src="<?=$book["cover"]?>">
        <?php if(isset($_SESSION["user"])) { ?>
            <div class="add-to-shoppcart">CESTO</div>
            <div class="add-to-list">LISTA</div>
        <?php } else { ?>
            <a href="<?=BASE_PATH."login"?>" class="add-to-shoppcart">CESTO</a>
            <a href="<?=BASE_PATH."login"?>" class="add-to-list">LISTA</a>
        <?php } ?>
        <div class="book-price"><?=$book["price"]?>€</div>
        <?php if($controller === "wishlists") { ?>
            <div class="remove-list-item">
                <img src="../../../icons/clientList_Icons/x-button.svg">
            </div>
        <?php } ?>
        </div>
        <div class="product-info">
            <h2 class="book-title"><?=$book["title"]?></h2>
            <p class="book-authors">escrito por: <strong><?=$book["author"]?></strong></p>
        </div>
        <?php if($controller === "wishlists") { ?>
            <button type="button" class="list-item-buy">COMPRAR</button>
            <button type="button" class="list-item-reserve">RESERVAR</button>
            <textarea class="book-coment" placeholder="Inserir comentário" data-id="<?=$book["book_id"]?>"></textarea>
            <button type="button" class="save-comment d-none">GRAVAR</button>
        <?php } ?>
    </div>
<?php } ?>