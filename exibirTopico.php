<?php
include_once('cabecalho.php');
include_once('menuSuperior.php');
include_once('model/topico.inc');
include_once('model/usuario.inc');
include_once('model/mensagem.inc');

$maximoPaginas = 3;

$topico = unserialize($_SESSION['topico']);

if (isset($_SESSION['idUsuarioLogado'])) {
    $idUsuarioLogado = $_SESSION['idUsuarioLogado'];
} else {
    $idUsuarioLogado = 0;
}

if (isset($_SESSION['totalPaginas'])) {
    $totalPaginas = $_SESSION['totalPaginas'];
} else {
    $totalPaginas = 1;
}

if (isset($_SESSION['paginaAtual'])) {
    $paginaAtual = $_SESSION['paginaAtual'];
} else {
    $paginaAtual = 1;
}

if (isset($_SESSION['statusTopico'])) {
    $statusTopico = $_SESSION['statusTopico'];
} else {
    $statusTopico = '2';
}

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
} else {
    $status = '0';
}

$listaMensagens = $topico->getMensagem();

?>
<br>
<div class="container col-md-7">
    <div class="card border-0">
        <div class="card-body text-white" style="background-color: #25262D;">
            <?php
            if($status == 2){
                echo "<div class='alert alert-success text-center' role='alert'>Resposta excluída com sucesso!</div>";
            }
            echo "<h4>".$topico->getAssunto()."</h4><br>";
            ?>

                <div class="rom float-md-left">Criado por: <?php echo $topico->getUsuario()->getNome(); ?>. </div>
                <div class="rom float-md-right"><?php echo date('d/m/Y - H:i',$topico->getDataCriacao()); ?></div>
                <textarea class="form-control border-dark" rows="4" readonly style="background-color: #ffffff;"><?php echo $topico->getDescricao(); ?></textarea>
                    <?php
                    if ($topico->getUsuario()->getIdUsuario() == $idUsuarioLogado) {
                        echo "<a href='controler/controlerTopico.php?opcao=6&idTopico=".$topico->getIdTopico()."'  class='btn btn-danger btn-sm float-md-right'  role='button' aria-pressed='true'>Excluir tópico</a><br>";
                    }
                    echo "<br>";
                    if ($statusTopico == '1') {
                        echo "<div class='alert alert-success' role='alert'>Tópico criado com sucesso!</div>";
                    } else if ($statusTopico == '2') {
                        if (count($listaMensagens) > 0) {
                            echo "<h6>Respostas:</h6>";
                            echo "<div class='card border-0' style='background-color: #393D46;'>";
                            echo "<div class='card-body'>";
                            for ($i = 0; $i < count($listaMensagens); $i++) {
                                echo "<div class='rom float-md-left'>" . $listaMensagens[$i]->getUsuario()->getNome() . " respondeu:</div>";
                                echo "<div class='rom float-md-right'>" . date('d/m/Y - H:i', $listaMensagens[$i]->getDataEnvio()) . "</div>";
                                echo "<textarea class='form-control' rows='4' readonly style='background-color: #ffffff;'>" . $listaMensagens[$i]->getMensagem() . "</textarea>";
                                if ($listaMensagens[$i]->getUsuario()->getIdUsuario() == $idUsuarioLogado) {
                                    echo "<a href='controler/controlerTopico.php?opcao=5&idMensagem=".$listaMensagens[$i]->getIdMensagem()."'  class='btn btn-danger btn-sm float-md-right'  role='button' aria-pressed='true'>Excluir resposta</a><br>";
                                }
                                echo "<br>";
                            }
                            echo "</div>";
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-warning' role='alert'>Desculpe, mas este tópico ainda não teve nenhuma resposta.</div>";
                        }
                    }
                    ?>
            <br>

            <?php

            if (isset($_SESSION['usuarioLogado'])){
            ?>
            <form class="needs-validation" novalidate action="controler/controlerTopico.php" method="post">
                <input type="hidden" name="opcao" value="2">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Responder:</label>
                        <textarea class="form-control border-dark" id="validationCustom02" name="mensagem" rows="4" placeholder="Digite aqui uma resposta para este tópico" required></textarea>
                        <div class="invalid-feedback">
                            Insira uma mensagem, por favor!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-md-right" type="submit">Enviar resposta</button>
                <br>
            </form>

            <?php
            } else {
                echo "<a href='controler/controlerTopico.php' class='btn btn-primary active float-md-right' role='button' aria-pressed='true'>Clique aqui para efetuar login e responder este tópico</a><br>";
            }

            if ($totalPaginas > 1) {
                echo "<br><br>";
                echo "<nav aria-label='paginacao'>";
                echo "<ul class='pagination justify-content-md-center'>";
                echo "<li class='page-item'><a class='page-link' href='controler/controlerTopico.php?opcao=3&pagina=1' tabindex='-1' aria-disabled='true'>Primeira Página</a></li>";
                for ($paginaAnterior = $paginaAtual - $maximoPaginas; $paginaAnterior <= $paginaAtual - 1; $paginaAnterior++) {
                    if($paginaAnterior >= 1){
                        echo "<li class='page-item'><a class='page-link' href='controler/controlerTopico.php?opcao=3&pagina=".$paginaAnterior."'>".$paginaAnterior."</a></li>";
                    }
                }
                echo "<li class='page-item active' aria-current='page'>";
                echo "<a class='page-link'>".$paginaAtual."<span class='sr-only'>(current)</span></a>";
                echo "</li>";
                for ($paginaSeguinte = $paginaAtual + 1; $paginaSeguinte <= $paginaAtual + $maximoPaginas; $paginaSeguinte++) {
                    if($paginaSeguinte <= $totalPaginas){
                        echo "<li class='page-item'><a class='page-link' href='controler/controlerTopico.php?opcao=3&pagina=".$paginaSeguinte."'>".$paginaSeguinte."</a></li>";
                    }
                }
                echo "<li class='page-item'><a class='page-link' href='controler/controlerTopico.php?opcao=3&pagina=".$totalPaginas."' tabindex='-1' aria-disabled='true'>Última Página</a></li>";
                echo "</ul>";
                echo "</nav>";
            }
            ?>

        </div>
    </div>
</div>
<br>

<?php
include_once('rodape.php');
?>
