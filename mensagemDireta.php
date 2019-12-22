<?php
include_once('cabecalho.php');
include_once('menuSuperior.php');
include_once('model/topico.inc');
include_once('model/usuario.inc');
include_once('model/mensagemDireta.inc');

$maximoPaginas = 3;

$listaMensagensDireta = unserialize($_SESSION['listaMensagensDireta']);
$usuarioDestino = unserialize($_SESSION['usuarioDestino']);

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

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
} else {
    $status = '0';
}

?>
<br>
<div class="container col-md-7">
    <div class="card border-0">
        <div class="card-body text-white" style="background-color: #25262D;">
            <?php
            if($status == 2){
                echo "<div class='alert alert-success text-center' role='alert'>Mensagem excluída com sucesso!</div>";
            }
            echo "<h4>Conversa com " .$usuarioDestino->getNome()."</h4><br>";
            if (count($listaMensagensDireta) > 0) {
                echo "<div class='card border-0' style='background-color: #393D46;'>";
                echo "<div class='card-body'>";
                for ($i = 0; $i < count($listaMensagensDireta); $i++) {
                    echo "<div class='rom float-md-left'>" . $listaMensagensDireta[$i]->getUsuarioOrigem()->getNome() ." disse:</div>";
                    echo "<div class='rom float-md-right'>" . date('d/m/Y - H:i', $listaMensagensDireta[$i]->getDataEnvio()) . "</div>";
                    echo "<textarea class='form-control' rows='4' readonly style='background-color: #ffffff;'>" . $listaMensagensDireta[$i]->getMensagem() . "</textarea>";
                    if ($listaMensagensDireta[$i]->getUsuarioOrigem()->getIdUsuario() == $idUsuarioLogado) {
                        echo "<a href='controler/controlerMensagemDireta.php?opcao=4&idMensagemDireta=".$listaMensagensDireta[$i]->getIdMensagem()."'  class='btn btn-danger btn-sm float-md-right'  role='button' aria-pressed='true'>Excluir mensagem</a><br>";
                    }
                    echo "<br>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>Nenhuma conversa encontrada. Envie agora uma mensagem para ".$usuarioDestino->getNome().".</div>";
            }
            echo "<br>";

            if (isset($_SESSION['usuarioLogado'])){

                echo "<form class='needs-validation' novalidate action='controler/controlerMensagemDireta.php' method='post'>";
                echo "<input type='hidden' name='opcao' value='2'>";
                echo "<input type='hidden' name='idUsuarioDestino' value='".$usuarioDestino->getIdUsuario()."'>";
                echo "<div class='form-row'>";
                echo "<div class='col-md-12 mb-3'>";
                echo "<label for='validationCustom02'>Mensagem:</label>";
                echo "<textarea class='form-control border-dark' id='validationCustom02' name='mensagem' rows='4' placeholder='Digite aqui sua mensagem' required></textarea>";
                echo "<div class='invalid-feedback'>Insira uma mensagem, por favor!</div>";
                echo "</div>";
                echo "</div>";
                echo "<button class='btn btn-primary float-md-right' type='submit'>Enviar mensagem</button>";
                echo "<br>";
                echo "</form>";
                echo "";

            } else {
                echo "<a href='controler/controlerTopico.php' class='btn btn-primary active float-md-right' role='button' aria-pressed='true'>Clique aqui para efetuar login e responder este tópico</a><br>";
            }

            if ($totalPaginas > 1) {
                echo "<br><br>";
                echo "<nav aria-label='paginacao'>";
                echo "<ul class='pagination justify-content-md-center'>";
                echo "<li class='page-item'><a class='page-link' href='controler/controlerMensagemDireta.php?opcao=1&pagina=1' tabindex='-1' aria-disabled='true'>Primeira Página</a></li>";
                for ($paginaAnterior = $paginaAtual - $maximoPaginas; $paginaAnterior <= $paginaAtual - 1; $paginaAnterior++) {
                    if($paginaAnterior >= 1){
                        echo "<li class='page-item'><a class='page-link' href='controler/controlerMensagemDireta.php?opcao=1&pagina=".$paginaAnterior."'>".$paginaAnterior."</a></li>";
                    }
                }
                echo "<li class='page-item active' aria-current='page'>";
                echo "<a class='page-link'>".$paginaAtual."<span class='sr-only'>(current)</span></a>";
                echo "</li>";
                for ($paginaSeguinte = $paginaAtual + 1; $paginaSeguinte <= $paginaAtual + $maximoPaginas; $paginaSeguinte++) {
                    if($paginaSeguinte <= $totalPaginas){
                        echo "<li class='page-item'><a class='page-link' href='controler/controlerMensagemDireta.php?opcao=1&pagina=".$paginaSeguinte."'>".$paginaSeguinte."</a></li>";
                    }
                }
                echo "<li class='page-item'><a class='page-link' href='controler/controlerMensagemDireta.php?opcao=1&pagina=".$totalPaginas."' tabindex='-1' aria-disabled='true'>Última Página</a></li>";
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
