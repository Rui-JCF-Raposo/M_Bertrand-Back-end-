<?php 
    if(!isset($_SESSION["shopcart_books"])) {
        exit;
    }

    $totalItems = 0;
    $totalPrice = 0;
    
    foreach($_SESSION["shopcart_books"] as $book) {
        $totalItems += $book["quantity"];
        $totalPrice += $book["quantity"] * $book["price"];
    }

?>
<div class="shoppcart-footer">
    <div class="shoppcart-total-info">
        <span class="shoppcart-total-items"><?= $totalItems ?></span><span>ITENS/TOTAL</span>
        <span class="shoppcart-total-price"><?= $totalPrice ?>€</span>
    </div>
    <button type="button" class="shoppcart-checkout">CHECKOUT</button>
</div>