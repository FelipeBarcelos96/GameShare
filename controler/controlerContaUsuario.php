<?php
include_once("../model/usuario.inc");
include_once("../dao/usuarioDAO.inc");

session_start();

$opcao = (int) $_REQUEST['opcao'];

$usuarioDAO = new UsuarioDAO();

if ($opcao == 1) {
    header("Location:../contaUsuario.php");
} else if ($opcao == 2) {
    $usuarioLogado = unserialize($_SESSION['usuarioLogado']);

    $nome = $_REQUEST['nome'];
    $senha = $_REQUEST['senha'];

    $usuarioDAO->alterarUsuario($usuarioLogado->getIdUsuario(), $nome, $senha);

    $usuarioLogado = $usuarioDAO->buscarUsuarioPorId($usuarioLogado->getIdUsuario());

    $_SESSION['usuarioLogado'] = serialize($usuarioLogado);
    $_SESSION['nomeUsuarioLogado'] = $usuarioLogado->getNome();

    header("Location:../contaUsuario.php?status=1");
}

?>
