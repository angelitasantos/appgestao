<?php verificaPermissaoPaginaSite(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Downloads</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-listar"><button class="btn btn-sm btn-success" type="button">Listar Downloads</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {

            $CIN = $_SESSION['CIN'];
            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria'];
            $datapublicacao = $_POST['datapublicacao'];
            $tags = $_POST['tags'];
            $resumo = $_POST['resumo'];
            $conteudo = $_POST['conteudo'];
            $arquivo = $_POST['arquivo'];
            $slug = $_POST['titulo'];

            if ($titulo == '' || $conteudo == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            } else {
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.downloads` WHERE CIN = ? AND titulo = ?");
                $verificar->execute(array($_SESSION['CIN'], $_POST['titulo']));
                if ($verificar->rowCount() == 0) {

                    $slug = PHP::generateSlug($titulo);
                    $array = ['CIN' => $_SESSION['CIN'], 'titulo' => $titulo, 'categoria' => $categoria, 
                    'datapublicacao' => $datapublicacao, 'tags' => $tags, 'resumo' => $resumo, 'conteudo' => $conteudo, 
                    'arquivo' => $arquivo, 'slug' => $slug, 'nome_tabela' => 'tb_site.downloads'];
                    if (PHP::insertOne($array)) {
                        PHP::redirect(INCLUDE_PATH_PAINEL . 'site-downloads-adicionar?sucesso');
                    }
                } else {
                    Painel::alert("erro", 'Já existe um download com este nome!');
                }
            }
        }
        if (isset($_GET['sucesso']))
            Painel::alert('sucesso', 'Cadastro efetuado com sucesso!');
        ?>

        <div class="">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>
        <!--form-group-->

        <div class="row form-group">
            <div class="col-sm-6">
                <label class="mt-2">Título:</label>
                <input class="form-control" type="text" name="titulo" value="<?php recoverPost('titulo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Categoria:</label>
                <select class="form-control" name="categoria">
                    <?php
                    foreach (Site::$categoriasSite as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Data Publicação:</label>
                <input class="form-control" formato="data" type="text" name="datapublicacao" value="<?php echo date('d/m/Y') ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Tags:</label>
                <input class="form-control" type="text" name="tags" value="<?php recoverPost('tags'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Arquivo:</label>
                <input class="form-control" type="text" name="arquivo" value="<?php recoverPost('arquivo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Resumo:</label>
                <input class="form-control" type="text" name="resumo" value="<?php recoverPost('resumo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Conteúdo:</label>
                <textarea class="form-control" name="conteudo" value="<?php recoverPost('conteudo'); ?>"></textarea>
            </div>
            <!--form-group-->

        </div>

        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="nome_tabela" value="tb_site.downloads" />
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success mt-3">
            </div>
            <!--form-group-->
        </div>

    </form>

</div>
<!--box-painel-->