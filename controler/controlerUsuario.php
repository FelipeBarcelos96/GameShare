<?php
include_once("../model/usuario.inc");
include_once("../dao/usuarioDAO.inc");

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();

if ($opcao == 1) {
    $login = $_REQUEST["login"];

    $usuario = $usuarioDAO->buscarUsuarioPorLogin($login);

    if (isset($usuario)) {
        header("Location:../formLogin.php?status=2");
    } else {
        $email = $_REQUEST["email"];

        $usuario = $usuarioDAO->buscarUsuarioPorEmail($email);

        if (isset($usuario)) {
            header("Location:../formLogin.php?status=3");
        } else {

            $nome = $_REQUEST["nome"];
            $senha = $_REQUEST["senha"];

            $usuario = new Usuario(0, $nome, $email, $login, $senha);

            $usuarioDAO->incluirUsuario($usuario);

            header("Location:../formLogin.php?status=1");
        }
    }
}

?>