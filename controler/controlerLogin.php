<?php
include_once("../model/usuario.inc");
include_once("../dao/usuarioDAO.inc");

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();

if ($opcao == 1) {
    $login = $_REQUEST["login"];
    $senha = $_REQUEST["senha"];

    $usuario = $usuarioDAO->efetuarLogin($login, $senha);

    if (isset($usuario)) {
        session_start();

        $_SESSION["usuarioLogado"] = serialize($usuario);
        $_SESSION["nomeUsuarioLogado"] = $usuario->getNome();
        $_SESSION["idUsuarioLogado"] = $usuario->getIdUsuario();


        if (isset($_REQUEST["idTopico"])) {
            $idTopico = $_REQUEST["idTopico"];

            header("Location:controlerTopico.php?opcao=4&idTopico=".$idTopico);
        } else {
            header("Location:controlerListaTopicos.php?opcao=1");
        }
    } else {
        header("Location:../formLogin.php?status=4");
    }
} else if ($opcao == 2) {
    session_start();
    session_destroy();

    header("Location:../index.php");
}

?>