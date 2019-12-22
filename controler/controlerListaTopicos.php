<?php
include_once("../model/usuario.inc");
include_once("../model/topico.inc");
include_once("../dao/usuarioDAO.inc");
include_once("../dao/topicoDAO.inc");

session_start();

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();
$topicoDAO = new TopicoDAO();

if ($opcao == 1) {
    if (isset($_REQUEST['pagina'])) {
        $pagina = $_REQUEST['pagina'];
    } else {
        $pagina = 1;
    }

    if (isset($_REQUEST['status'])) {
        $status = $_REQUEST['status'];
    } else {
        $status = 0;
    }

    $listaTopicosAux = $topicoDAO->getTopicosUltimaAtualiazacao();

    $totalItensPagina = 20;
    $totalTopicos = $topicoDAO->getTotalTopicos();
    $totalPaginas = ceil($totalTopicos / $totalItensPagina);

    $finalIntervalo = ($pagina * $totalItensPagina) - 1;
    $inicioIntervalo = $finalIntervalo - $totalItensPagina + 1;

    if ($totalTopicos <= $finalIntervalo) {
        $finalIntervalo = ($totalTopicos - 1);
    }

    for ($i = $inicioIntervalo; $i <= $finalIntervalo; $i++) {
        $listaTopicos[] = $listaTopicosAux[$i];
    }

    $_SESSION['listaTopicos'] = serialize($listaTopicos);
    $_SESSION['totalPaginas'] = $totalPaginas;
    $_SESSION['paginaAtual'] = $pagina;

    header("Location:../listaTopicos.php?status=".$status);
}

?>