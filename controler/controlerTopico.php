<?php
include_once("../model/usuario.inc");
include_once("../model/topico.inc");
include_once("../model/mensagem.inc");
include_once("../dao/usuarioDAO.inc");
include_once("../dao/topicoDAO.inc");
include_once("../dao/mensagemDAO.inc");

session_start();

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();
$topicoDAO = new TopicoDAO();
$mensagemDAO = new MensagemDAO();


if ($opcao == 1 && isset($_SESSION['usuarioLogado'])) {
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    $assunto = $_REQUEST['assunto'];
    $descricao = $_REQUEST['descricao'];

    $topico = new Topico(null, $usuarioLogado, $assunto, $descricao, time(), time());

    $topicoDAO->incluirTopico($topico);

    $idUltimoTopico = (string) $topicoDAO->buscarIdUltimoTopico();

    $topico->setIdTopico($idUltimoTopico);

    $_SESSION['topico'] = serialize($topico);
    $_SESSION['statusTopico'] = 1;
    $_SESSION['totalPaginas'] = 0;
    $_SESSION['paginaAtual'] = 0;

    header("Location:../exibirTopico.php");
} else if ($opcao == 2 && isset($_SESSION['usuarioLogado'])) {
    $mensagem = $_REQUEST['mensagem'];

    $topico = unserialize($_SESSION['topico']);
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    $mensagemPostada = new Mensagem(0, $usuarioLogado, $mensagem, time());

    $mensagemDAO->incluirMensagem($mensagemPostada, $topico->getidTopico());

    $_SESSION['topico'] = serialize($topico);

    header("Location:controlerTopico.php?opcao=3&pagina=0");
} else if ($opcao == 3) {
    $topico = unserialize($_SESSION['topico']);

    $topico->limparMensagens();

    if (isset($_REQUEST['pagina'])) {
        $pagina = $_REQUEST['pagina'];
    } else {
        $pagina = 0;
    }

    if (isset($_REQUEST['status'])) {
        $status = $_REQUEST['status'];
    } else {
        $status = 0;
    }

    $totalItensPagina = 10;
    $totalMensagens = $mensagemDAO->getTotalMensagens($topico->getIdTopico());
    $totalPaginas = ceil($totalMensagens / $totalItensPagina);

    if ($pagina == 0){
        $pagina = $totalPaginas;
    }

    $finalIntervalo = ($pagina * $totalItensPagina) - 1;
    $inicioIntervalo = $finalIntervalo - $totalItensPagina + 1;

    if ($totalMensagens <= $finalIntervalo) {
        $finalIntervalo = ($totalMensagens - 1);
    }

    if ($totalMensagens != 0) {
        $listaMensagens = $mensagemDAO->getMensagens($topico->getIdTopico());

        for ($i = $inicioIntervalo; $i <= $finalIntervalo; $i++) {
            $topico->addMensagem($listaMensagens[$i]);
        }
    }

    $_SESSION['topico'] = serialize($topico);
    $_SESSION['totalPaginas'] = $totalPaginas;
    $_SESSION['paginaAtual'] = $pagina;
    $_SESSION['statusTopico'] = 2;

    header("Location:../exibirTopico.php?status=".$status);
} else if ($opcao == 4){
    $idTopico = (int) $_REQUEST['idTopico'];

    $topico = $topicoDAO->buscarTopicoPorId($idTopico);

    $_SESSION['topico'] = serialize($topico);

    header("Location:controlerTopico.php?opcao=3");
}  else if ($opcao == 5 && isset($_SESSION['usuarioLogado'])) {
    $idMensagem = $_REQUEST['idMensagem'];

    $mensagemDAO->excluirMensagem($idMensagem);

    header("Location:controlerTopico.php?opcao=3&status=2");
} else if ($opcao == 6 && isset($_SESSION['usuarioLogado'])) {
    $idTopico = $_REQUEST['idTopico'];

    $topicoDAO->excluirTopico($idTopico);

    header("Location:controlerListaTopicos.php?opcao=1&status=2");
} else if (!isset($_SESSION['usuarioLogado'])){
    $topico = unserialize($_SESSION['topico']);

    header("Location:../formLogin.php?status=5&idTopico=".$topico->getIdTopico());
}

?>