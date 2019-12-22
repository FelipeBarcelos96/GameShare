<?php
include_once('cabecalho.php');
include_once('menuSuperior.php');
include_once('model/usuario.inc');

$maximoPaginas = 3;

if (isset($_SESSION['totalPaginas'])) {
    $totalPaginas = $_SESSION['totalPaginas'];
} else {
    $totalPaginas = 1;
}

if (isset($_SESSION['paginaAtual'])) {
    $paginaAtual = $_SESSION['paginaAtual'];
} else {
    $paginaAtual = 1;
}

if (isset($_SESSION['listaUsuarios'])){
    $listaUsuarios = unserialize($_SESSION['listaUsuarios']);
}

?>

    <br>
    <div class="container col-md-6">
        <div class="card border-0">
            <div class="card-body text-white" style="background-color: #25262D;">
                <?php if (isset($_SESSION['listaUsuarios'])) {?>
                    <h1 class="text-center">Lista de Usuários</h1><br>
                    <table class="table text-white">
                        <thead>
                        <tr>
                            <th scope='col'>Nome</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 0; $i < count($listaUsuarios); $i++) {
                            echo "<tr>";
                            echo "<td>".$listaUsuarios[$i]->getNome()."</td>";
                            echo "<th scope='row'><a class='text-primary' href='controler/controlerMensagemDireta.php?opcao=3&idUsuarioDestino=".$listaUsuarios[$i]->getIdUsuario()."'>Enviar Mensagem Direta</a></th>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } else {
                    echo "<div class='alert alert-warning' role='alert'>Nenhum tópico foi cadastrado ainda.</div>";
                }

                if ($totalPaginas > 1) {
                    echo "<br>";
                    echo "<nav aria-label='paginacao'>";
                    echo "<ul class='pagination justify-content-md-center'>";
                    echo "<li class='page-item'><a class='page-link' href='controler/controlerListaUsuarios.php?opcao=1&pagina=1' tabindex='-1' aria-disabled='true'>Primeira Página</a></li>";
                    for ($paginaAnterior = $paginaAtual - $maximoPaginas; $paginaAnterior <= $paginaAtual - 1; $paginaAnterior++) {
                        if ($paginaAnterior >= 1) {
                            echo "<li class='page-item'><a class='page-link' href='controler/controlerListaUsuarios.php?opcao=1&pagina=" . $paginaAnterior . "'>" . $paginaAnterior . "</a></li>";
                        }
                    }
                    echo "<li class='page-item active' aria-current='page'>";
                    echo "<a class='page-link'>" . $paginaAtual . "<span class='sr-only'>(current)</span></a>";
                    echo "</li>";
                    for ($paginaSeguinte = $paginaAtual + 1; $paginaSeguinte <= $paginaAtual + $maximoPaginas; $paginaSeguinte++) {
                        if ($paginaSeguinte <= $totalPaginas) {
                            echo "<li class='page-item'><a class='page-link' href='controler/controlerListaUsuarios.php?opcao=1&pagina=" . $paginaSeguinte . "'>" . $paginaSeguinte . "</a></li>";
                        }
                    }
                    echo "<li class='page-item'><a class='page-link' href='controler/controlerListaUsuarios.php?opcao=1&pagina=" . $totalPaginas . "' tabindex='-1' aria-disabled='true'>Última Página</a></li>";
                    echo "</ul>";
                    echo "</nav>";
                }

                ?>
            </div>
        </div>
    </div>
    <br>

<?php
include_once('rodape.php');
?>