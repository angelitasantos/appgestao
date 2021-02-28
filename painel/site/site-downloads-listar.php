<?php
verificaPermissaoPaginaSite(1);

if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    PHP::deleteOne('tb_site.downloads', $idExcluir);
    PHP::redirect(INCLUDE_PATH_PAINEL . 'site-downloads-listar');
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$downloads = PHP::selectAllTitleCIN('tb_site.downloads', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">

    <h3><i class="fa fa-bars"></i> Lista Downloads</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-adicionar"><button class="btn btn-sm btn-success" type="button">Adicionar Downloads</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <div class="container-fluid table-responsive">

        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Título</th>
                    <th>Data</th>
                    <th>Categoria</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>

            <?php
            foreach ($downloads as $key => $value) {
            ?>
                <tbody>
                    <tr class="text-center">
                        <td><?php echo $value['titulo']; ?></td>
                        <td><?php echo $value['datapublicacao']; ?></td>
                        <td><?php echo strtoupper(selecionaCategorias($value['categoria'])); ?></td>
                        <td><button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"><i class="fa fa-eye"></button></td>
                        <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-editar?id=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                        <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-listar?excluir=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></button></a></td>
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
                                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-editar?id=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Alterar</button></a>
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
            $totalPaginas = ceil(count(PHP::selectAllCIN('tb_site.downloads')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaAtual)
                    echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'site-downloads-listar?pagina=' . $i . '">' . $i . '</a>';
                else
                    echo '<a href="' . INCLUDE_PATH_PAINEL . 'site-downloads-listar?pagina=' . $i . '">' . $i . '</a>';
            }

            ?>

        </div>
        <!--paginacao-->

    </div>
    <!--table-responsive-->

</div>
<!--box-content-->