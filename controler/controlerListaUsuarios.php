<?php
include_once("../model/usuario.inc");
include_once("../dao/usuarioDAO.inc");

session_start();

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();

if ($opcao == 1) {
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    if (isset($_REQUEST['pagina'])) {
        $pagina = $_REQUEST['pagina'];
    } else {
        $pagina = 1;
    }

    $listaUsuariosAux = $usuarioDAO->getUsuarios();

    $totalItensPagina = 20;
    $totalUsuarios = $usuarioDAO->getTotalUsuarios();
    $totalPaginas = ceil($totalUsuarios / $totalItensPagina);

    $finalIntervalo = ($pagina * $totalItensPagina) - 1;
    $inicioIntervalo = $finalIntervalo - $totalItensPagina + 1;

    if ($totalUsuarios <= $finalIntervalo) {
        $finalIntervalo = ($totalUsuarios - 1);
    }

    for ($i = $inicioIntervalo; $i <= $finalIntervalo; $i++) {
        if ($usuarioLogado->getIdUsuario() != $listaUsuariosAux[$i]->getIdUsuario()) {
            $listaUsuarios[] = $listaUsuariosAux[$i];
        }
    }

    $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
    $_SESSION['totalPaginas'] = $totalPaginas;
    $_SESSION['paginaAtual'] = $pagina;

    header("Location:../listaUsuarios.php");
}

?>