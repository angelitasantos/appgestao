<?php
verificaPermissaoPaginaSite(1);

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $downloads = PHP::selectOne('tb_site.downloads', 'id = ?', array($id));
} else {
    Painel::alert('erro', 'Você precisa passar o parametro ID.');
    die();
}
?>

<div class="box-content">
    <h3><i class="fa fa-pen"></i> Editar Downloads</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-listar"><button class="btn btn-sm btn-success" type="button">Listar Downloads</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php

        $CIN = $_SESSION['CIN'];

        if (isset($_POST['acao'])) {
            $slug = PHP::generateSlug($_POST['titulo']);
            $array = array_merge($_POST, array('slug' => $slug));

            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.downloads` WHERE CIN = ? AND titulo = ? AND id != ?");
            $verificar->execute(array($_SESSION['CIN'], $_POST['titulo'], $id));
            $info = $verificar->fetch();
            if ($verificar->rowCount() == 1) {
                Painel::alert("erro", 'Já existe um download com este nome!');
            } else {

                if (PHP::updateOne($array)) {
                    Painel::alert('sucesso', 'Cadastro alterado com sucesso!');
                    $downloads = PHP::selectOne('tb_site.downloads', 'id = ?', array($id));
                } else {
                    Painel::alert('erro', 'Campos vazios não são permitidos.');
                }
            }
        }
        ?>

        <div class="">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>
        <!--form-group-->

        <div class="row form-group">
            <div class="col-sm-6">
                <label class="mt-2">Título:</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo ($downloads['titulo']); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Categoria:</label>
                <input class="form-control" type="text" name="categoria" value="<?php echo ($downloads['categoria']); ?>" disabled>
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Data Publicação:</label>
                <input class="form-control" formato="data" type="text" name="datapublicacao" value="<?php echo $downloads['datapublicacao']; ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Tags:</label>
                <input class="form-control" type="text" name="tags" value="<?php echo ($downloads['tags']); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Arquivo:</label>
                <input class="form-control" type="text" name="arquivo" value="<?php echo ($downloads['arquivo']); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Resumo:</label>
                <input class="form-control" type="text" name="resumo" value="<?php echo ($downloads['resumo']); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Conteúdo:</label>
                <textarea class="form-control" name="conteudo"><?php echo $downloads['conteudo']; ?></textarea>
            </div>
            <!--form-group-->

        </div>

        <div class="row">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nome_tabela" value="tb_site.downloads" />
                <input type="submit" name="acao" value="Editar" class="btn btn-sm btn-success mt-3">
            </div>
        </div>
        <!--form-group-->

    </form>

</div>
<!--box-painel-->