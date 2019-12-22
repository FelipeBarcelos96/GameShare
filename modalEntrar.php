<?php ?>
    <div class="modal fade" id="entrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="needs-validation" action="controler/controlerLogin.php" method="post" novalidate>
                    <input type="hidden" name="opcao" value="1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Entre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" id="exampleInputLogin" name="login" placeholder="Ex: joaosilva" required>
                            <div class="invalid-feedback">
                                Digite seu login.
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha aqui" required>
                            <div class="invalid-feedback">
                                Digite sua senha.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>