<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php");?>

<body id="order-details-body">

    <?php require("templates/adminMainNav.php"); ?>
    <?php require("templates/adminCategoriesNav.php"); ?>

    <main id="order-details-main">
        <h2>Número de encomenda: <?=$order_details[0]["order_id"]?></h2>

        <table class="checkOut-table">
            <thead>
                <tr>
                    <th>PRODUTO</th>
                    <th class="od-quantity">QUANTIDADE</th>
                    <th class="od-price">PREÇO</th>
                </tr>
            </thead>
            <tbody class="checkOut-products-output">
                <?php foreach($order_details as $order) { 
                     if(substr($order["cover"], 0, 4) !== "http") {
                        $coverPrefix = "../../img/book-images/";
                    } else {
                        $coverPrefix = "";
                    } 
                ?>
                    <tr class="table-product-row">
                        <td>
                            <div>
                                <?php if (!empty($order["cover"])) { ?>
                                    <img class="book-cover-img" src="<?=$coverPrefix.$order["cover"]?>" alt="book cover">
                                <?php } ?>
                            </div>
                            <div class="table-book-info">
                                <div>
                                    <span class="table-book-name"> <?=empty($order["title"])  ? "Livro removido da loja": $order["title"]?></span>
                                </div>
                            <div>
                        </td>
                        <td class="od-quantity">
                            <div class="checkOut-controls">
                                <span class="book-box-quanitity" data-order_id="<?=$order["order_id"]?>" data-book_id="<?=$order["book_id"]?>"><?=$order["quantity"]?></span>
                            </div>
                        </td>
                        <td class="od-price">
                           <?=$order["price"]?>€
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="<?=BASE_PATH."admin/ordersManaging"?>">
            <button>Voltar ás ecomendas</button>
        </a>

    </main>

</body>
</html>