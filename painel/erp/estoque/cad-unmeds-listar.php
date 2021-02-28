<?php
permissaoCatalogosPagina(1);

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$unmeds = PHP::selectAllDescCIN('tb_cad.unmeds', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">

    <h3><i class="fa fa-bars"></i> Lista Unidades de Medida</h3>

    <div class="right">
        <a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-unmeds-adicionar"><button class="btn btn-sm btn-success" type="button">Adicionar Unidade</button></a>
    </div>

    <div class="clear"></div><!-- clear -->

    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Abreviação</th>
                    <th>Descrição</th>
                    <th>#</th>
                </tr>
            </thead>

            <?php
            foreach ($unmeds as $key => $value) {
            ?>
                </body>
                <tr>
                    <td><?php echo strtoupper($value['abreviacao']); ?></td>
                    <td><?php echo strtoupper($value['descricao']); ?></td>
                    <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>cad-unmeds-editar?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                </tr>
                </tbody>
            <?php } ?>

        </table>

    </div>
    <!--table-->

    <div class="paginacao">
        <?php
        $totalPaginas = ceil(count(PHP::selectAllCIN('tb_cad.unmeds')) / $porPagina);

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual)
                echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'cad-unmeds-listar?pagina=' . $i . '">' . $i . '</a>';
            else
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'cad-unmeds-listar?pagina=' . $i . '">' . $i . '</a>';
        }
        ?>

    </div>
    <!--paginacao-->

</div>
<!--box-content-->