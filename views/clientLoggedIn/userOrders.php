<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body>

    <?php require("templates/mainNav.php") ?>
    <?php require("templates/categoriesNav.php") ?>

    <main id="orders-main">
        <section>
            <?php if(!empty($orders)) { ?>
                <h2>As suas encomendas, estimado/a <?=$_SESSION["user"]["name"]?>.</h2>
            <?php } else { ?>
                <h2>De momento não tem qualquer encomenda, estimado/a <?=$_SESSION["user"]["name"]?>.</h2>
            <?php } ?>
            <?php if (!empty($orders)) { ?>
                <table>
                    <tr>
                        <th class="order-number">Número de encomenda</th>
                        <th>Quantidade</th>
                        <th class="payment">Pagamento</th>
                        <th class="require-date">Data de Requisição</th>
                        <th>Data de entrega</th>
                        <th>Preço</th>
                        <th>Detalhes</th>
                        <th>Cancelar</th>
                    </tr>
                    <?php foreach($orders as $order) { 
                        
                    ?>
                        <tr data-order_id="<?=$order["order_id"]?>">
                            <td class="order-number"><?=$order["order_id"]?></td>
                            <td><?=$order["quantity"]?></td>
                            <td class="payment"><?=(int)$order["paid"] === 0 ? "Pendente":"Pago" ?></td>
                            <td class="require-date"><?=$order["order_date"]?></td>
                            <td><?=strtotime($order["delivered_date"]) < 0 ? "Por entregar":"Entregue" ?></td>
                            <td><?=$order["price"]?>€</td>
                            <td>
                                <a href="<?=BASE_PATH."orders/details/".$order["order_id"]?>">
                                    <button class="see-details">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <?php if (strtotime($order["delivered_date"]) < 0 ) { ?>
                                    <button class="cancel-order">
                                        <i class="far fa-calendar-times"></i>
                                    </button>
                                <?php } else { ?>
                                    Fechada
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </section>
    </main>
</body>

</html>