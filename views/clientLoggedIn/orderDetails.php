<?php 





?>
<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php");?>

<body id="order-details-body">

    <?php require("templates/mainNav.php"); ?>
    <?php require("templates/categoriesNav.php"); ?>

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
                                <div class="table-book-edit">
                                <?php if(!empty($order["title"])) { ?>
                                    <a href="">
                                        <span>REMOVER DA ENCOMENDA</span>
                                    </a>
                                <?php } else { ?>
                                    <a href="">
                                        <span>OBTER INFORMAÇÃO (295 000 000)</span>
                                    </a>
                                <?php }  ?>
                                </div>
                            <div>
                        </td>
                        <td class="od-quantity">
                            <div class="checkOut-controls">
                                <?php if(!empty($order["title"])) { ?>
                                    <a href="">
                                        <img class="minus-quantity" src="../../icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                                    </a>
                                <?php } ?>
                                <span class="book-box-quanitity"><?=$order["quantity"]?></span>
                                <?php if(!empty($order["title"])) { ?>
                                    <a href="">
                                        <img class="more-quantity" src="../../icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                                    </a>
                                <?php } ?>
                            </div>
                        </td>
                        <td class="od-price">
                           <?=$order["price"]?>€
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="<?=BASE_PATH."orders"?>">
            <button>Voltar ás ecomendas</button>
        </a>

    </main>

</body>
</html>