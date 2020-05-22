<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body>

    <?php require("templates/mainNav.php") ?>
    <?php require("templates/categoriesNav.php") ?>

    <main id="orders-main">
        <header>
            <h2>Aqui encontram-se as suas encomendas <?=$_SESSION["user"]["name"]?></h2>    
        </header>  
        <section>
            <h2>Encomendas</h2>
            <table>
                <tr>
                    <th>Número de encomenda</th>
                    <th>Quantidade</th>
                    <th>Pagamento</th>
                    <th>Data de Requisição</th>
                    <th>Data de entrega</th>
                    <th>Preço</th>
                    <th>Detalhes</th>
                    <th>Cancelar</th>
                </tr>
                <?php foreach($orders as $order) { ?>
                    <tr>
                        <td><?=$order["order_id"]?></td>
                        <td><?=$order["quantity"]?></td>
                        <td><?=$order["paid"] === 0 ? "Pendente":"Pago" ?></td>
                        <td><?=$order["order_date"]?></td>
                        <td><?=strtotime($order["delivered_date"]) < 0 ? "Por entregar":"Entregue" ?></td>
                        <td><?=$order["price"]?>€</td>
                        <th><i class="far fa-eye"></i></th>
                        <td>X</td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>
</body>

</html>