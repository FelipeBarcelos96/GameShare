<?php
    include_once('cabecalho.php');
    include_once('menuSuperior.php');
?>
<br>
<div class="container col-md-7">
    <div class="card border-0 text-white" style="background-color: #25262D;">
        <div class="card-body">
            <h1 class="text-center">Novo Tópico</h1><br>
            <form class="needs-validation" novalidate action="controler/controlerTopico.php" method="post">
                <input type="hidden" name="opcao" value="1">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Assunto</label>
                        <input type="text" class="form-control" id="validationCustom01" name="assunto" placeholder="Ex: Biscoito ou bolacha?" required>
                        <div class="invalid-feedback">
                            Insira o título do tópico, por favor!!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Mensagem</label>
                        <textarea class="form-control" id="validationCustom02" name="descricao" rows="4" placeholder="Digite aqui uma mensagem com detalhes para a discussão deste tópico" required></textarea>
                        <div class="invalid-feedback">
                            Insira uma mensagem, por favor!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-md-right" type="submit">Enviar</button>
                <br>
            </form>
        </div>
    </div>
</div>
<br>

<?php
    include_once('rodape.php');
?>
