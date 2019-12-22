<?php
include_once('cabecalho.php');
include_once('menuSuperior.php');
include_once('model/topico.inc');
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

if (isset($_SESSION['listaTopicos'])){
    $listaTopicos = unserialize($_SESSION['listaTopicos']);
}

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
} else {
    $status = '0';
}

?>

    <br>
    <div class="container col-md-7">
        <div class="card border-0">
            <div class="card-body text-white" style="background-color: #25262D;">
                <?php if (isset($_SESSION['listaTopicos'])) {?>
                    <?php
                        if($status == 2){
                            echo "<div class='alert alert-success text-center' role='alert'>Tópico excluído com sucesso!</div>";
                        }

                    ?>
                <h1 class="text-center">Lista de tópicos</h1><br>
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">Tópico</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Criado em</th>
                            <th scope="col">Última postagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i = 0; $i < count($listaTopicos); $i++) {
                                echo "<tr>";
                                echo "<th scope='row'><a class='text-primary' href='controler/controlerTopico.php?opcao=4&idTopico=".$listaTopicos[$i]->getIdTopico()."'>".$listaTopicos[$i]->getAssunto()."</a></th>";
                                echo "<td>".$listaTopicos[$i]->getUsuario()->getNome()."</td>";
                                echo "<td>".date('d/m/Y - H:i', $listaTopicos[$i]->getDataCriacao())."</td>";
                                echo "<td>".date('d/m/Y - H:i', $listaTopicos[$i]->getDataUltimaAtualizacao())."</td>";
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
                    echo "<li class='page-item'><a class='page-link' href='controler/controlerListaTopicos.php?opcao=1&pagina=1' tabindex='-1' aria-disabled='true'>Primeira Página</a></li>";
                    for ($paginaAnterior = $paginaAtual - $maximoPaginas; $paginaAnterior <= $paginaAtual - 1; $paginaAnterior++) {
                        if ($paginaAnterior >= 1) {
                            echo "<li class='page-item'><a class='page-link' href='controler/controlerListaTopicos.php?opcao=1&pagina=" . $paginaAnterior . "'>" . $paginaAnterior . "</a></li>";
                        }
                    }
                    echo "<li class='page-item active' aria-current='page'>";
                    echo "<a class='page-link'>" . $paginaAtual . "<span class='sr-only'>(current)</span></a>";
                    echo "</li>";
                    for ($paginaSeguinte = $paginaAtual + 1; $paginaSeguinte <= $paginaAtual + $maximoPaginas; $paginaSeguinte++) {
                        if ($paginaSeguinte <= $totalPaginas) {
                            echo "<li class='page-item'><a class='page-link' href='controler/controlerListaTopicos.php?opcao=1&pagina=" . $paginaSeguinte . "'>" . $paginaSeguinte . "</a></li>";
                        }
                    }
                    echo "<li class='page-item'><a class='page-link' href='controler/controlerListaTopicos.php?opcao=1&pagina=" . $totalPaginas . "' tabindex='-1' aria-disabled='true'>Última Página</a></li>";
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