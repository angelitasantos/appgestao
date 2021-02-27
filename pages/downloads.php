<?php
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$downloads = PHP::selectSiteAllDateCIN('tb_site.downloads', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="pt-5">
    <h3 class="py-5">Downloads</h3>
</div>

<div class="container-fluid table-responsive">

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th>Data</th>
                <th>Categoria</th>
                <th>Visualizar</th>
            </tr>
        </thead>

        <?php
        foreach ($downloads as $key => $value) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['datapublicacao']; ?></td>
                    <td><?php echo strtoupper(selecionaCategorias($value['categoria'])); ?></td>
                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"><i class="fa fa-eye"></button></td>
                </tr>

                <div class="modal fade" id="modal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">identificador: <?php echo $value['id']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Título: <?php echo $value['titulo']; ?></h6>
                                <h6>Categoria: <?php echo strtoupper(selecionaCategorias($value['categoria'])); ?></h6>
                                <h6>Data: <?php echo $value['datapublicacao']; ?></h6>
                                <h6>tags: <?php echo $value['tags']; ?></h6>
                                <h6>Resumo: <?php echo $value['resumo']; ?></h6>
                                <h6>Conteúdo: <?php echo $value['conteudo']; ?></h6>
                                <h6>Link: <?php echo $value['arquivo']; ?></h6>
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
        $totalPaginas = ceil(count(PHP::selectSiteAllCIN('tb_site.downloads')) / $porPagina);

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual)
                echo '<a class="page-selected" href="' . INCLUDE_PATH . 'downloads?pagina=' . $i . '">' . $i . '</a>';
            else
                echo '<a href="' . INCLUDE_PATH . 'downloads?pagina=' . $i . '">' . $i . '</a>';
        }

        ?>

    </div>
    <!--paginacao-->

</div>
<!--table-responsive-->