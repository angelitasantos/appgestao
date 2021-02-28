<?php permissaoCatalogosPagina(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Serviço</h3>

    <div class="right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-servicos-listar"><button class="btn btn-sm btn-success" type="button">Lista Serviços</button></a></div>
    </div>

    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
        if (isset($_POST['acao'])) {

            $CIN = $_SESSION['CIN'];
            $descricao = $_POST['descricao'];
            $EAN = $_POST['EAN'];

            if ($descricao == '') {
                Painel::alert('erro', 'Campos vazios não são permitidos!');
            } else {
                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_cad.servicos` WHERE CIN = ? AND descricao = ? AND EAN = ? ");
                $verificar->execute(array($_SESSION['CIN'], $_POST['descricao'], $_POST['EAN']));

                if ($verificar->rowCount() == 0) {

                    if (PHP::insertOne($_POST)) {
                        PHP::redirect(INCLUDE_PATH_PAINEL . 'cad-servicos-adicionar?sucesso');
                    }
                } else {
                    Painel::alert("erro", 'Já existe um registro com esta descrição!');
                }
            }
        }
        if (isset($_GET['sucesso']))
            Painel::alert('sucesso', 'Cadastro efetuado com sucesso!');
        ?>

        <div class="">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>

        <div class="row">
            <div class="col-sm-6 mt-2">
                <label>Categoria:</label>
                <select class="form-control" name="categoria_id">
                    <?php
                    $categorias = PHP::selectAllCIN('tb_cad.categorias');
                    foreach ($categorias as $key => $value) {
                    ?>
                        <option <?php if ($value['id'] == @$_POST['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['descricao']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6 mt-2">
                <label>UnMed:</label>
                <select class="form-control" name="unmed_id">
                    <?php
                    $unmeds = PHP::selectAllCIN('tb_cad.unmeds');
                    foreach ($unmeds as $key => $value) {
                    ?>
                        <option <?php if ($value['id'] == @$_POST['unmed_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['descricao']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-2">
                <label>Descrição:</label>
                <input class="form-control" type="text" name="descricao" value="<?php recoverPost('descricao'); ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mt-2">
                <label>Código Interno *:</label>
                <input class="form-control" type="text" name="EAN" value="<?php recoverPost('EAN'); ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-3">
                <input type="hidden" name="nome_tabela" value="tb_cad.servicos" />
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success">
            </div>
        </div>

    </form>

</div>
<!--box-content-->