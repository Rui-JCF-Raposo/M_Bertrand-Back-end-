<!DOCTYPE html>
<html lang="pt">
    
    <?php require("templates/mainHeader.php"); ?>

<body class="admin-zone">
    
    <?php require("templates/adminMainNav.php"); ?> 
    <?php require("templates/adminCategoriesNav.php"); ?>
    
    <main id="orders-main">
        
       <h1>Gestão de Encomendas</h1>

        <section>
            <?php if(!empty($orders)) { ?>
                <h2>Veja aqui as encomendas dos seus clientes, <?=$_SESSION["user"]["name"]?>.</h2>
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
                        <th>Finalizar</th>
                    </tr>
                    <?php foreach($orders as $order) { 
                        
                    ?>
                        <tr data-order_id="<?=$order["order_id"]?>">
                            <td class="order-number"><?=$order["order_id"]?></td>
                            <td><?=$order["total_quantity"]?></td>
                            <td class="payment"><?=(int)$order["paid"] === 0 ? "Pendente":"Pago" ?></td>
                            <td class="require-date"><?=$order["order_date"]?></td>
                            <td><?=strtotime($order["delivered_date"]) < 0 ? "Por entregar":$order["delivered_date"] ?></td>
                            <td><?=$order["price"]?>€</td>
                            <td>
                                <a href="<?=BASE_PATH."admin/ordersManaging/".$order["order_id"]?>">
                                    <button class="see-details">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <?php if (strtotime($order["delivered_date"]) < 0 ) { ?>
                                    <button class="order-done" data-order_id="<?=$order["order_id"]?>">
                                        <i class="fas fa-check order-done"></i>
                                    </button>
                                <?php } else { ?>
                                    Fechada
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
            <div class="orders-nav">
                <div>
                    <form method="POST" action="<?= BASE_PATH."admin/ordersManaging"?>" class="page-backward">
                        <input type="hidden" name="pageDown">
                        <button type="submit">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </form>
                </div>
                <div><span class="current-page"><?=isset($pageOffset) ? $pageOffset:1?></span><span>/</span><span class="total-pages"><?=$totalOrders?></span></div>
                <div>
                    <form method="POST" action="<?= BASE_PATH."admin/ordersManaging"?>" class="page-forward">
                        <input type="hidden" name="pageUp">
                        <button type="submit">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>



</body>
</html>