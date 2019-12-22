<?php
    include_once('cabecalho.php');
    include_once('menuSuperior.php');

    if(isset($_REQUEST['status'])) {
        $status = (int)$_REQUEST['status'];

        echo "<br><div class='container col-md-4 '>";
        echo "<div>";
        if($status == 1){
            echo "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
        } else if($status == 2){
            echo "<div class='alert alert-danger' role='alert'>Usuário já cadastrado para este login! Entre para continuar.</div>";
        } else if($status == 3){
            echo "<div class='alert alert-danger' role='alert'>Usuário já cadastrado para este email! Entre para continuar.</div>";
        } else if($status == 4){
            echo "<div class='alert alert-danger' role='alert'>Login ou senha inválidos! Verifique e tente novamente.</div>";
        } else if($status == 5){
            echo "<div class='alert alert-warning' role='alert'>Faça o login para continuar.</div>";
            $idTopico = (int)$_REQUEST['idTopico'];
        }
        echo "</div>";
        echo "</div>";
    }

?>

    <div class="container col-md-4">
        <div class="card text-white border-0" style="background-color: #25262D;">
            <div class="card-body">
                <form class="needs-validation" action="controler/controlerLogin.php<?php if (isset($idTopico)) echo "?idTopico=".$idTopico ?>" method="post" novalidate>
                    <input type="hidden" name="opcao" value="1">
                    <br><h1 class="text-center">Entre</h1>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" id="exampleInputLogin" name="login" placeholder="Ex: joaosilva" required>
                            <div class="invalid-feedback">
                                Digite seu login.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha aqui" required>
                            <div class="invalid-feedback">
                                Digite sua senha.
                            </div>
                        </div>
                    </div>
                    <div class="form-group float-md-right">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
<?php
include_once('rodape.php');
?>

