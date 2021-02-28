<?php permissaoCatalogosPagina(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Unidade Medida</h3>

    <div class="right">
        <a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-unmeds-listar"><button class="btn btn-sm btn-success" type="button">Lista Unidades</button></a>
    </div>

    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {

            $CIN = $_SESSION['CIN'];
            $descricao = $_POST['descricao'];
            $abreviacao = $_POST['abreviacao'];

            if ($descricao == '' || $abreviacao == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            } else {
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_cad.unmeds` WHERE CIN = ? AND abreviacao = ?");
                $verificar->execute(array($_SESSION['CIN'],$_POST['abreviacao']));
                if ($verificar->rowCount() == 0) {

                    $slug = PHP::generateSlug($descricao);
                    $array = ['CIN' => $_SESSION['CIN'], 'abreviacao' => $abreviacao, 'descricao' => $descricao, 'slug' => $slug, 'nome_tabela' => 'tb_cad.unmeds'];
                    if (PHP::insertOne($array)) {
                        PHP::redirect(INCLUDE_PATH_PAINEL . 'cad-unmeds-adicionar?sucesso');
                    }
                } else {
                    Painel::alert("erro", 'Já existe um registro com esta descrição!');
                }
            }
        }
        if (isset($_GET['sucesso']))
            Painel::alert('sucesso', 'Cadastro efetuado com sucesso!');
        ?>

        <div class="form-group">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>

        <div class="row">
            <div class="col-sm-3">
                <label>Abreviação:</label>
                <input class="form-control" type="text" name="abreviacao">
            </div>
            <div class="col-sm-9">
                <label>Descrição:</label>
                <input class="form-control" type="text" name="descricao">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success">
            </div>
        </div>

    </form>

</div>
<!--box-content-->