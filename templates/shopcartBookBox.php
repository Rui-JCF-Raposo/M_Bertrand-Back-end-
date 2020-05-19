<?php 
    $preFix = isset($url_parts[3]) ? "../":"";

    if(substr($book["cover"], 0, 4) !== "http") {
        $coverPrefix = "../img/book-images/";
    } else {
        $coverPrefix = "";
    } 

    if(!isset($url_parts[3]) && substr($book["cover"], 0, 4) !== "http") {
        $coverPrefix = "img/book-images/";
    }
?>
<div>
    <div class="shoppcart-book-box" data-bookid="<?=$book["book_id"]?>">
        <div class="shoppcart-book-img">
            <img src="<?=$coverPrefix.$book["cover"]?>" alt="book cover">
        </div>
        <div class="book-box-info">
            <div>
                <dl>
                    <dt class="shop-book-box-title"><?=$book["title"]?></dt>
                    <dd class="shop-book-box-price"><?=$book["price"]?>€</dd>
                </dl>
            </div>
            <div class="book-box-info2">
                <div class="book-box-quantity-controls">
                    <img class="minus-quantity" src="<?= $preFix ?>icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                    <span class="book-box-quanitity"><?=$book["quantity"]?></span>
                    <img class="more-quantity" src="<?= $preFix ?>icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                </div>
                <span class="shop-book-box-delete">
                    <img src="<?= $preFix ?>icons/clientLoggenIn_Icons/shopCart/delete.svg">
                </span>
            </div>
        </div>
    </div>
    <hr class="shoppcart-book-box-hr">
</div>