<?php
    include_once('cabecalho.php');
    include_once('menuSuperior.php');
?>
<br>
<div class="container col-md-4">
    <div class="card text-white border-0" style="background-color: #25262D;">
        <div class="card-body">
            <h1 class="text-center">Cadastre-se</h1><br>
            <form class="needs-validation" novalidate action="controler/controlerUsuario.php" method="post">
                <input type="hidden" name="opcao" value="1">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Nome completo</label>
                        <input type="text" class="form-control" id="validationCustom01" name="nome" placeholder="Ex: João da Silva" required>
                        <div class="invalid-feedback">
                            Insira o seu nome, por favor!!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">E-mail</label>
                        <input type="email" class="form-control" id="validationCustom02" name="email" aria-describedby="emailHelp" placeholder="Ex: joao@email.com" required>
                        <div class="invalid-feedback">
                            Insira o seu email, por favor!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Login</label>
                        <input type="text" class="form-control" id="validationCustom03" name="login" placeholder="Ex: joaosilva" required>
                        <div class="invalid-feedback">
                            Insira o seu login, por favor!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Senha</label>
                        <input type="password" class="form-control" id="validationCustom04" name="senha" placeholder="Digite sua senha aqui" required>
                        <div class="invalid-feedback">
                            Insira a sua senha, por favor!
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Li e concordo com os Termos de Uso e Política de Privacidade.
                        </label>
                        <div class="invalid-feedback">
                            Você deve aceitar antes de continuar.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
                <br>
            </form>
        </div>
    </div>
    <br>

</div>

<?php
    include_once('rodape.php');
?>
