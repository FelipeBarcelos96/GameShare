<?php
include_once('cabecalho.php');
include_once('menuSuperior.php');
include_once('model/usuario.inc');

$usuarioLogado = unserialize($_SESSION['usuarioLogado']);

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
} else {
    $status = 0;
}

?>
<br>
<div class="container col-md-7">
    <div class="card border-0">
        <div class="card-body text-white" style="background-color: #25262D;">
            <?php
                echo "<div class='container col-md-6 text-center'>";
                echo "<div>";
                if($status == 1){
                    echo "<div class='alert alert-success' role='alert'>Usuário alterado com sucesso!</div>";
                }
                echo "</div>";
                echo "</div>";
            ?>
            <div class="container col-md-8">
                <div class="card text-white border-0" style='background-color: #393D46;'>
                    <div class="card-body">
                        <h1 class="text-center">Minhas informações</h1><br>
                        <form class="needs-validation" novalidate action="controler/controlerContaUsuario.php" method="post">
                            <input type="hidden" name="opcao" value="2">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Alterar nome</label>
                                    <?php
                                    echo "<input type='text' class='form-control' id='validationCustom01' name='nome' placeholder='Ex: João da Silva' value='".$usuarioLogado->getNome()."' required>";
                                    ?>
                                    <div class="invalid-feedback">
                                        Insira o seu nome, por favor!!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Nova senha</label>
                                    <input type="password" class="form-control" id="validationCustom04" name="senha" placeholder="Nova senha" required>
                                    <div class="invalid-feedback">
                                        Insira a sua senha, por favor!
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-md-right" type="submit">Confirmar alteração</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<?php
include_once('rodape.php');
?>
