<!DOCTYPE html>
<html lang="en">

<?php require("templates/mainHeader.php");?>

<body>
    
    <?php require("templates/mainNav.php"); ?>

    <?php require("templates/categoriesNav.php"); ?>

    <main id="homepage-main" class="homepage-main-col-90">

        <section id="slider">
            <div class="slider-container">
                <div class="prev-img-slide slider-arrow">
                    <img src="img/slider-imgs/icons/back.svg" alt="change slider image">
                </div>
                <div class="slider-imgs">
                    <img src="img/slider-imgs/slider-img-1.jpg" alt="slider image">
                    <img src="img/slider-imgs/slider-img-2.jpg" alt="slider image">
                    <img src="img/slider-imgs/slider-img-3.jpg" alt="slider image">
                    <img src="img/slider-imgs/slider-img-4.png" alt="slider image">
                    <img src="img/slider-imgs/slider-img-5.png" alt="slider image">
                </div>
                <div class="next-img-slide slider-arrow">
                    <img src="img/slider-imgs/icons/arrow-point-to-right.svg" alt="change slider image">
                </div>
            </div>
            <div class="slider-info-container">
                <div class="slider-info">
                    <h1>Fique atento ás nossa novidades</h1>
                    <p>
                        Destacamos aqui todos os nossos descontos, eventos e oportunidades semanalmente.
                        Caso deseje ser notificado por email, subscreva à nossa newsletter.
                    </p>
                    <form method="POST" action="index.html">
                        <div>
                            <input type="email" name="newsletter" placeholder="O seu email..." 2>
                        </div>
                        <button type="submit" name="send">Subscrever</button>
                    </form>
                </div>
            </div>
        </section> <!-- end slider section -->

        <section id="homepage-news">
            <div class="homepage-nav">
                <ul>
                    <li><a href="#news-anchor">Novidades</a></li>
                    <li><a href="#pre-releases-anchor">Pré-Lançamentos</a></li>
                    <li><a href="#events-anchor">Eventos</a></li>
                </ul>
            </div> <!-- end homepage nav -->
            <div class="news">
                <div id="news-anchor"></div>
                <h1>NOVIDADES</h1>
                <div class="new-books"></div>
            </div> <!-- end homepage news -->
            <div class="pre-release">
                <div id="pre-releases-anchor"></div>
                <h1>PRÉ-LANÇAMENTOS</h1>
                <div class="pre-releases"></div>
            </div> <!-- end homepage pre-releases -->
            <div class="events">
                <div id="events-anchor"></div>
                <h1>EVENTOS</h1>
                <div class="events-wrapper">
                    <div class="event-box">
                        <img src="./img/events-imgs/event-1.jpg" alt="banner de evento">
                        <h2>FEIRA DE TROCA DE LIVROS</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, sapiente sit assumenda illum, totam
                            nihil odit vel, non consectetur modi nobis earum sint dolorem hic?</p>
                    </div>
                    <div class="event-box">
                        <img src="./img/events-imgs/event-2.jpg" alt="banner de evento">
                        <h2>LANÇAMENTO DE LIVROS EDUECE</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, sapiente sit assumenda illum, totam
                            nihil odit vel, non consectetur modi nobis earum sint dolorem hic?</p>
                    </div>
                    <div class="event-box">
                        <img src="./img/events-imgs/event-3.jpg" alt="banner de evento">
                        <h2>FEIRA DO LIVRO</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, sapiente sit assumenda illum, totam
                            nihil odit vel, non consectetur modi nobis earum sint dolorem hic?</p>
                    </div>
                    <div class="event-box">
                        <img src="./img/events-imgs/event-4.jpg" alt="banner de evento">
                        <h2>3ª FEIRA DE TROCA DE LIVROS</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, sapiente sit assumenda illum, totam
                            nihil odit vel, non consectetur modi nobis earum sint dolorem hic?</p>
                    </div>
                </div>
            </div> <!-- end homepage events -->
        </section>

        <footer>
            <div class="back-to-top">
                <a href="#"><img src="./icons/up.svg" alt="back to top arrow"></a>
            </div>
            <hr class="footer-hr">
            <div class="footer-wrapper">
                <div class="footer-box">
                    <p>Para a sua segurança</p>
                    <ul>
                        <li><a href="#">Condições de venda</a></li>
                        <li><a href="#">Compras 100% seguras</a></li>
                        <li><a href="#">Política de privacidade</a></li>
                    </ul>
                </div>
                <div class="footer-box">
                    <p>Estamos aqui para o ajudar</p>
                    <ul>
                        <li><a href="#">Como comprar</a></li>
                        <li><a href="#">Mapa do site</a></li>
                        <li><a href="#">Ajuda</a></li>
                        <li><a href="#">Contacte-nos</a></li>
                        <li><a href="#">Livro de Reclamações Eletrónico</a></li>
                    </ul>
                </div>
                <div class="footer-box">
                    <p>Ponto de encontro</p>
                    <ul>
                        <li><a href="#">Blogue Somos Livros</a></li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">Receber novidades</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
                <div class="footer-box">
                    <p>Quem somos</p>
                    <ul>
                        <li><a href="#">As nossas livrarias</a></li>
                        <li><a href="#">Café MYPROJECT</a></li>
                        <li><a href="#">Trabalhar connosco</a></li>
                    </ul>
                </div>
            </div>
            <hr class="footer-hr">
            <div class="final-footer">
                <p>
                    Salvo onde se indique um período de vigência mais alargado, os preços, promoções e ofertas são válidos
                    das 00:00:00 de 25-11-2019 às 23:59:59 de 25-11-2019 e só para a livraria MYPROJECT online.
                    &copy;2019 Grupo MYPROJECT. Todos os direitos reservados, Açores, Portugal
                </p>
            </div>
        </footer>
    </main>


</body>

</html>