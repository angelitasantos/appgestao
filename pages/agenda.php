<?php
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$agenda = PHP::selectSiteAllTitleCIN('tb_site.agenda', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="pt-5">
    <h3 class="py-5">Agenda</h3>
</div>

<div class="container-fluid table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Evento</th>
                <th>Local</th>
                <th>Data Início</th>
                <th>Data Término</th>
                <th>Categoria</th>
                <th>Visualizar</th>
            </tr>
        </thead>

        <?php
        foreach ($agenda as $key => $value) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['local']; ?></td>
                    <td><?php echo $value['datainicio']; ?></td>
                    <td><?php echo $value['datatermino']; ?></td>
                    <td><?php echo strtoupper(selecionaCategorias($value['categoria'])); ?></td>
                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"><i class="fa fa-eye"></button></td>
                </tr>

                <div class="modal fade" id="modal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">identificador: <?php echo $value['id']; ?></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Evento: <?php echo $value['titulo']; ?></h6>
                                <h6>Local: <?php echo $value['local']; ?></h6>
                                <h6>Início: <?php echo $value['datainicio']; ?></h6>
                                <h6>Término: <?php echo $value['datatermino']; ?></h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div><!-- Modal -->

            </tbody>
        <?php } ?>

    </table>
    <!--table-->

    <div class="paginacao">
        <?php
        $totalPaginas = ceil(count(PHP::selectSiteAllCIN('tb_site.agenda')) / $porPagina);

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual)
                echo '<a class="page-selected" href="' . INCLUDE_PATH . 'agenda?pagina=' . $i . '">' . $i . '</a>';
            else
                echo '<a href="' . INCLUDE_PATH . 'agenda?pagina=' . $i . '">' . $i . '</a>';
        }

        ?>
    </div>
    <!--paginacao-->

</div>
<!--table-responsive-->