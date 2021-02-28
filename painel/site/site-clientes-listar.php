<?php
verificaPermissaoPaginaSite(1);

if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    PHP::deleteOne('tb_site.clientes', $idExcluir);
    PHP::redirect(INCLUDE_PATH_PAINEL . 'site-clientes-listar');
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$clientes = PHP::selectAllTitleCIN('tb_site.clientes', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">

    <h3><i class="fa fa-bars"></i> Lista Clientes</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-adicionar"><button class="btn btn-sm btn-success" type="button">Adicionar Clientes</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <div class="container-fluid table-responsive">

        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Empresa</th>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>

            <?php
            foreach ($clientes as $key => $value) {
            ?>
                <tbody>
                    <tr class="text-center">
                        <td><?php echo $value['titulo']; ?></td>
                        <td><?php echo $value['datapublicacao']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['cargo']; ?></td>
                        <td><button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal<?php echo $value['id']; ?>"><i class="fa fa-eye"></button></td>
                        <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-editar?id=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                        <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-listar?excluir=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></button></a></td>
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
                                    <h6>Empresa: <?php echo $value['titulo']; ?></h6>
                                    <h6>Nome: <?php echo $value['nome']; ?></h6>
                                    <h6>Cargo: <?php echo $value['cargo']; ?></h6>
                                    <h6>Conteúdo: <?php echo $value['conteudo']; ?></h6>
                                    <h6>Data: <?php echo $value['datapublicacao']; ?></h6>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-editar?id=<?php echo $value['id']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Alterar</button></a>
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
            $totalPaginas = ceil(count(PHP::selectAllCIN('tb_site.clientes')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaAtual)
                    echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'site-clientes-listar?pagina=' . $i . '">' . $i . '</a>';
                else
                    echo '<a href="' . INCLUDE_PATH_PAINEL . 'site-clientes-listar?pagina=' . $i . '">' . $i . '</a>';
            }

            ?>

        </div>
        <!--paginacao-->

    </div>
    <!--table-responsive-->

</div>
<!--box-content-->