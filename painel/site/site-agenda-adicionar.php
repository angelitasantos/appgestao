<?php verificaPermissaoPaginaSite(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Agenda</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>site-agenda-listar"><button class="btn btn-sm btn-success" type="button">Listar Agenda</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {

            $CIN = $_SESSION['CIN'];
            $titulo = $_POST['titulo'];
            $local = $_POST['local'];
            $categoria = $_POST['categoria'];
            $datainicio = $_POST['datainicio'];
            $datatermino = $_POST['datatermino'];
            $slug = $_POST['titulo'];
            $inativo = '0';

            if ($titulo == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            } else {
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.agenda` WHERE CIN = ? AND titulo = ?");
                $verificar->execute(array($_SESSION['CIN'], $_POST['titulo']));
                if ($verificar->rowCount() == 0) {

                    $slug = PHP::generateSlug($titulo);
                    $array = [
                        'CIN' => $_SESSION['CIN'], 'titulo' => $titulo, 'local' => $local, 'categoria' => $categoria, 'datainicio' => $datainicio,
                        'datatermino' => $datatermino, 'slug' => $slug, 'inativo' => $inativo, 'nome_tabela' => 'tb_site.agenda'
                    ];
                    if (PHP::insertOne($array)) {
                        PHP::redirect(INCLUDE_PATH_PAINEL . 'site-agenda-adicionar?sucesso');
                    }
                } else {
                    Painel::alert("erro", 'Já existe um evento com este nome!');
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
                <label class="mt-2">Evento:</label>
                <input class="form-control" type="text" name="titulo" value="<?php recoverPost('titulo'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-6">
                <label class="mt-2">Local:</label>
                <input class="form-control" type="text" name="local" value="<?php recoverPost('local'); ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-4">
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

            <div class="col-sm-4">
                <label class="mt-2">Data Início:</label>
                <input class="form-control" formato="data" type="text" name="datainicio" value="<?php echo date('d/m/Y') ?>">
            </div>
            <!--form-group-->

            <div class="col-sm-4">
                <label class="mt-2">Data Término:</label>
                <input class="form-control" formato="data" type="text" name="datatermino" value="<?php echo date('d/m/Y') ?>">
            </div>
            <!--form-group-->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="nome_tabela" value="tb_site.agenda" />
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success mt-3">
            </div>
            <!--form-group-->
        </div>

    </form>

</div>
<!--box-painel-->