<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body>


    <?php require("templates/mainNav.php"); ?>

    <main id="checkOutPages">

        <header class="checkOutSteps">
            <div class="confirm-steps separateSteps activeStep">
                <a href="#">CONFIRMAÇÃO</a>
            </div>
        </header>

        <section id="checkOut-products-info">
            <div class="container">
                <header>
                    <div>
                        <img src="../icons/clientLoggenIn_Icons/checkOut/exclamation-mark.svg" alt="warning icon">
                    </div>
                    <div>
                        <span>Importante</span>
                        <span>Os produtos assinalados a vermelho sofreram alterações no preço e/ou desconto.</span>
                    </div>
                </header>
                <table class="checkOut-table">
                    <thead>
                        <tr>
                            <th>PRODUTO</th>
                            <th>QUANTIDADE</th>
                            <th>PREÇO</th>
                        </tr>
                    </thead>
                    <tbody class="checkOut-products-output">
                    </tbody>
                </table>
                <div class="checkOut-deliver-conditions">
                    <div class="sell-conditions">
                        <a href="#">
                            Consultar condições gerais de venda
                        </a>
                    </div>
                    <div class="iva-info">
                        Preços em Euros (IVA incluído). Se inferiores ao Preço de Editor, este é rasurado.
                    </div>
                    <div class="deliver-time-details">
                        Prazo previsto para envio da encomenda (dias úteis): Envio em 24 horas
                    </div>
                </div>
                <a href="<?=BASE_PATH."checkout/?order=true"?>">
                    <button type="button" class="avanceBtn registerBtn continue-to-order">Encomendar</button>
                </a>
                <div class="clearfix"></div>
            </div>
        </section>

    </main>
</body>

</html>