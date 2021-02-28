<?php verificaPermissaoPaginaSite(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Clientes</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-listar"><button class="btn btn-sm btn-success" type="button">Listar Clientes</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {

            $CIN = $_SESSION['CIN'];
            $titulo = $_POST['titulo'];
            $datapublicacao = $_POST['datapublicacao'];
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $conteudo = $_POST['conteudo'];
            $slug = $_POST['titulo'];

            if ($titulo == '' || $conteudo == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            } else {
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.clientes` WHERE CIN = ? AND titulo = ?");
                $verificar->execute(array($_SESSION['CIN'], $_POST['titulo']));
                if ($verificar->rowCount() == 0) {

                    $slug = PHP::generateSlug($titulo);
                    $array = [
                        'CIN' => $_SESSION['CIN'], 'titulo' => $titulo, 'datapublicacao' => $datapublicacao,
                        'nome' => $nome, 'cargo' => $cargo, 'conteudo' => $conteudo, 'slug' => $slug, 'nome_tabela' => 'tb_site.clientes'
                    ];
                    if (PHP::insertOne($array)) {
                        PHP::redirect(INCLUDE_PATH_PAINEL . 'site-clientes-adicionar?sucesso');
                    }
                } else {
                    Painel::alert("erro", 'Já existe um cliente com este nome!');
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
                <label class="mt-2">Empresa:</label>
                <input class="form-control" type="text" name="titulo" value="<?php recoverPost('titulo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Data Registro:</label>
                <input class="form-control" formato="data" type="text" name="datapublicacao" value="<?php echo date('d/m/Y') ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Nome:</label>
                <input class="form-control" type="text" name="nome" value="<?php recoverPost('nome'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Cargo:</label>
                <input class="form-control" type="text" name="cargo" value="<?php recoverPost('cargo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-12">
                <label class="mt-2">Conteúdo:</label>
                <textarea class="form-control" type="text" name="conteudo"></textarea>
            </div>
            <!--form-group-->

        </div>

        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="nome_tabela" value="tb_site.clientes" />
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success mt-3">
            </div>
            <!--form-group-->
        </div>

    </form>

</div>
<!--box-painel-->