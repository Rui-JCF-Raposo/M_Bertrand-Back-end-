<?php 

    if(!isset($_SESSION["user"])) {
        header("Location: ".BASE_PATH."login");
    }

?>
<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php"); ?>

<body>

    <?php require("templates/mainNav.php"); ?>    
    <?php require("templates/categoriesNav.php"); ?>

    <main>
        <div id="showcase">
            <h1>A minha livraria MYPROJECT</h1>
        </div>
        <section id="client-todos">
            <p>
                Seja bem-vindo(a) à sua livraria MYPROJECT online. <b>Em que podemos ajudá-lo(a) hoje?</b>
                <p>
                    <div class="todos">
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="logo/book.svg" alt="todo icon"></span>
                                    <span class="todo-title">Vantagens de ser <br> <b>Leitor MYPROJECT</b></span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="icons/clientLoggenIn_Icons/newspaper.svg" alt="todo icon"></span>
                                    <span class="todo-title"><b>Novidades</b> <br> no mundo dos livros</span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="icons/clientLoggenIn_Icons/wish-list.svg" alt="todo icon"></span>
                                    <span class="todo-title">Lista de <br><b>Desejos</b></span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="icons/clientLoggenIn_Icons/buy.svg" alt="todo icon"></span>
                                    <span class="todo-title"><b>Comprar</b> na livraria bertrand</span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="icons/clientLoggenIn_Icons/mouse.svg" alt="todo icon"></span>
                                    <span class="todo-title"><b>Reservar</b> um livro</span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>
                        <div class="todo-box">
                            <a href="#">
                                <div>
                                    <span class="img-container"><img src="icons/clientLoggenIn_Icons/truck.svg" alt="todo icon"></span>
                                    <span class="todo-title"><b>Portes grátis</b> nas suas encomendas</span>
                                    <span class="icon-container"><img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="arrow icon"></span>
                                </div>
                            </a>
                        </div>

                    </div>
        </section>
    </main>
</body>

</html>