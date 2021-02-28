<?php
permissaoCatalogosPagina(1);

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $categorias = PHP::selectOne('tb_cad.categorias', 'id = ?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}
?>

<div class="box-content">
    <h3><i class="fa fa-pen"></i> Editar Categoria</h3>

    <div class="right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-categorias-listar"><button class="btn btn-sm btn-success" type="button">Lista Categorias</button></a></div>
    </div>

    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {
            $slug = PHP::generateSlug($_POST['descricao']);
            $array = array_merge($_POST, array('slug' => $slug));

            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_cad.categorias` WHERE descricao = ? AND id != ?");
            $verificar->execute(array($_POST['descricao'], $id));
            $info = $verificar->fetch();
            if ($verificar->rowCount() == 1) {
                Painel::alert("erro", 'Já existe uma categoria com esta descrição!');
            } else {

                if (PHP::updateOne($array)) {
                    Painel::alert('sucesso', 'Categoria alterada com sucesso!');
                    $categorias = PHP::selectOne('tb_cad.categorias', 'id = ?', array($id));
                } else {
                    Painel::alert('erro', 'Campos vazios não são permitidos.');
                }
            }
        }
        ?>

        <div class="">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Descrição:</label>
                <input class="form-control" type="text" name="descricao" value="<?php echo strtoupper($categorias['descricao']); ?>">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nome_tabela" value="tb_cad.categorias" />
                <input type="submit" name="acao" value="Editar" class="btn btn-sm btn-success">
            </div>
        </div>

    </form>

</div>
<!--box-content-->