<?php
    include_once('cabecalho.php');
    include_once('menuSuperior.php');
?>
<br>
<div class="container col-md-7">
    <div class="card text-white border-0" style="background-color: #25262D;">
        <div class="card-body">
            <p class="text-center text-primary" style="font-size: 60px">GameShare</p>
            <br>
            <p class="text-center" style="font-size: 22px">A GameShare é uma comunidade de gamers brasileira criada em 2019 por estudantes de Sistemas de Informação da Universidade do Espírito Santo - UFES que tem como objetivo trazer a tona discussões variadas sobre os games. Aqui você pode participar de discussões relacionadas as mais diversas áreas e ficar sabendo de tudo que está rolando no mundo dos jogos.</p>
            <br>
            <div class="col-md-auto text-center">
                <a href='formUsuario.php'  class='btn btn-primary mr-sm-2 btn-lg'  role='button' aria-pressed='true'>Participe!</a>
            </div>
            <br><br>
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="picture/carrosel1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Cyberpunk 2077</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="picture/carrosel2.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Dota 2</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="picture/carrosel3.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Total War 2</h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php
    include_once('rodape.php');
?>

