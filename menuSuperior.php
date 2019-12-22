<?php
    session_start();

    if (isset($_SESSION['usuarioLogado'])) {
        $logado = true;
        $nomeUsuarioLogado = $_SESSION['nomeUsuarioLogado'];
    } else {
        $logado = false;
    }
?>
    <body style="background-color: #14151b;">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #25262D;">
            <div class="container">
                <a href='index.php'><img src="picture/logo.png" alt="50" class="figure-img" width="40" height="40"></a>&nbsp;&nbsp;&nbsp;
                <a class="navbar-brand h1 mb-0 text-primary" href="index.php">GameShare</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        if (isset($_SESSION['usuarioLogado'])){
                            echo "<li class='nav-item active'><a class='nav-link' href='formTopico.php'>Criar Novo Tópico</a></li>";
                        }
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="controler/controlerListaTopicos.php?opcao=1">Lista de Tópicos</a>
                        </li>
                        <?php
                        if (isset($_SESSION['usuarioLogado'])){
                            echo "<li class='nav-item active'><a class='nav-link' href='controler/controlerListaUsuarios.php?opcao=1'>Lista de Usuários</a></li>";
                        }
                        if (isset($_SESSION['usuarioLogado'])){
                            echo "<li class='nav-item active'><a class='nav-link' href='controler/controlerContaUsuario.php?opcao=1'>Minha Conta</a></li>";
                        }
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                    </ul>
                    <?php
                        if ($logado){
                            echo "<li class='nav-item'><a class='nav-link disabled' style='color: #ffffff;'>Olá ".$nomeUsuarioLogado."</a></li>";
                            echo "<form class='form-inline my-2 my-lg-0'>";
                            echo "<a href='controler/controlerLogin.php?opcao=2'  class='btn btn-danger mr-sm-2'  role='button' aria-pressed='true'>Sair</a>";
                            echo "</form>";
                        } else {
                            echo "<form class='form-inline my-2 my-lg-0'>";
                            echo "<a href='formUsuario.php'  class='btn btn-secondary mr-sm-2'  role='button' aria-pressed='true'>Cadastre-se</a>";
                            echo "<a href='#'  class='btn btn btn-primary my-2 my-sm-0' role='button' aria-pressed='true' data-toggle='modal' data-target='#entrar'>Entrar</a>";
                            echo "</form>";
                        }
                    ?>
                </div>
            </div>
        </nav>

<?php
    if (!$logado) {
        include_once('modalEntrar.php');
    }
?>


