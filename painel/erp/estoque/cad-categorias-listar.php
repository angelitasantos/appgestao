<?php
permissaoCatalogosPagina(1);

if (isset($_GET['excluir'])) {
    $idExcluir = intval($_GET['excluir']);
    PHP::deleteOne('tb_cad.categorias', $idExcluir);
    //Selecionar os itens com o id da categoria excluída
    $itens = MySql::conectar()->prepare("SELECT * FROM `tb_cad.itens` WHERE categoria_id = ?");
    $itens->execute(array($idExcluir));
    $itens = $itens->fetchAll();
    //Deletar todos os itens que possuem o id da categoria excluída
    $itens = MySql::conectar()->prepare("DELETE FROM `tb_cad.itens` WHERE categoria_id = ?");
    $itens->execute(array($idExcluir));
    PHP::redirect(INCLUDE_PATH_PAINEL . 'cad-categorias-listar');
}

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$categorias = PHP::selectAllDescCIN('tb_cad.categorias', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">
    <h3><i class="fa fa-bars"></i> Lista Categorias</h3>

    <div class="right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-categorias-adicionar"><button class="btn btn-sm btn-success" type="button">Adicionar Categoria</button></a></div>
    </div>

    <div class="clear"></div><!-- clear -->

    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>#</th>
                    <!--<td>#</td>-->
                </tr>
            </thead>
            <?php
            foreach ($categorias as $key => $value) {
            ?>
                <body>
                <tr>
                    <td><?php echo strtoupper($value['descricao']); ?></td>
                    <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>cad-categorias-editar?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                    <!--<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>cad-categorias-listar?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></a></td>-->
                </tr>
                </body> 
            <?php } ?>

        </table>

        <div class="paginacao">
            <?php
            $totalPaginas = ceil(count(PHP::selectAllCIN('tb_cad.categorias')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaAtual)
                    echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'cad-categorias-listar?pagina=' . $i . '">' . $i . '</a>';
                else
                    echo '<a href="' . INCLUDE_PATH_PAINEL . 'cad-categorias-listar?pagina=' . $i . '">' . $i . '</a>';
            }
            ?>

        </div>

    </div>

</div>
<!--box-content-->