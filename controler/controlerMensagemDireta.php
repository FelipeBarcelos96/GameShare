<?php
include_once("../model/usuario.inc");
include_once("../model/mensagemDireta.inc");
include_once("../dao/usuarioDAO.inc");
include_once("../dao/mensagemDiretaDAO.inc");

session_start();

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();
$mensagemDiretaDAO = new MensagemDiretaDAO();


if ($opcao == 1 && isset($_SESSION['usuarioLogado'])) {
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    $usuarioDestino = unserialize($_SESSION['usuarioDestino']);

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
    $totalMensagens = $mensagemDiretaDAO->getTotalMensagensDireta($usuarioLogado->getIdUsuario(), $usuarioDestino->getIdUsuario());
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

        $listaMensagensDiretaAux = $mensagemDiretaDAO->getMensagensDireta($usuarioLogado->getIdUsuario(), $usuarioDestino->getIdUsuario());

        $listaMensagensDireta = array();

        for ($i = $inicioIntervalo; $i <= $finalIntervalo; $i++) {
            $listaMensagensDireta[] = $listaMensagensDiretaAux[$i];
        }
    }

    $_SESSION['listaMensagensDireta'] = serialize($listaMensagensDireta);
    $_SESSION['totalPaginas'] = $totalPaginas;
    $_SESSION['paginaAtual'] = $pagina;
    $_SESSION['statusTopico'] = 2;
    $_SESSION['usuarioDestino'] = serialize($usuarioDestino);
    $_SESSION['idUsuarioLogado'] = $usuarioLogado->getIdUsuario();

    header("Location:../mensagemDireta.php?status=".$status);
} else if ($opcao == 2 && isset($_SESSION['usuarioLogado'])) {
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    $idUsuarioDestino = (int) $_REQUEST['idUsuarioDestino'];
    $mensagem = $_REQUEST['mensagem'];

    $usuarioDestino = $usuarioDAO->buscarUsuarioPorId($idUsuarioDestino);

    $mensagemDireta = new MensagemDireta(0, $usuarioLogado, $usuarioDestino, $mensagem, time());

    $mensagemDiretaDAO->incluirMensagemDireta($mensagemDireta);

    $_SESSION['$usuarioDestino'] = serialize($usuarioDestino);

    header("Location:controlerMensagemDireta.php?opcao=1");
} else if ($opcao == 3 && isset($_SESSION['usuarioLogado'])) {
    $idUsuarioDestino = $_REQUEST['idUsuarioDestino'];

    $usuarioDestino = $usuarioDAO->buscarUsuarioPorId($idUsuarioDestino);

    $_SESSION['usuarioDestino'] = serialize($usuarioDestino);

    header("Location:controlerMensagemDireta.php?opcao=1");
} else if ($opcao == 4 && isset($_SESSION['usuarioLogado'])) {
    $idMensagemDireta = $_REQUEST['idMensagemDireta'];

    $mensagemDiretaDAO->excluirMensagemDireta($idMensagemDireta);

    header("Location:controlerMensagemDireta.php?opcao=1&status=2");
}

?>