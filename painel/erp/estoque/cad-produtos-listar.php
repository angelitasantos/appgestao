<?php
permissaoCatalogosPagina(1);

if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    PHP::deleteOne('tb_cad.produtos', $idExcluir);
    PHP::redirect(INCLUDE_PATH_PAINEL . 'cad-produtos-listar');
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$produtos = PHP::selectAllDescCIN('tb_cad.produtos', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">
    <h3><i class="fa fa-bars"></i> Lista Produtos</h3>

    <div class="right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-produtos-adicionar"><button class="btn btn-sm btn-success" type="button">Adicionar Produto</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>UnMed</th>
                    <th>Categoria</th>
                    <th>Cód.Interno</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>

            <?php
            foreach ($produtos as $key => $value) {
                $nomeCategoria = PHP::selectOne('tb_cad.categorias', 'id=?', array($value['categoria_id']))['descricao'];
                $nomeUnMed = PHP::selectOne('tb_cad.unmeds', 'id=?', array($value['unmed_id']))['descricao'];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo strtoupper($value['descricao']); ?></td>
                        <td><?php echo strtoupper($nomeUnMed); ?></td>
                        <td><?php echo strtoupper($nomeCategoria); ?></td>
                        <td><?php echo $value['EAN']; ?></td>
                        <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>cad-produtos-editar?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                        <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>cad-produtos-listar?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></a></td>
                    </tr>
                </tbody>
            <?php } ?>

        </table>

    </div>

    <div class="paginacao">
        <?php
        $totalPaginas = ceil(count(PHP::selectAllCIN('tb_cad.produtos')) / $porPagina);

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual)
                echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'cad-produtos-listar?pagina=' . $i . '">' . $i . '</a>';
            else
                echo '<a href="' . INCLUDE_PATH_PAINEL . 'cad-produtos-listar?pagina=' . $i . '">' . $i . '</a>';
        }
        ?>

    </div>

</div>
<!--box-content-->