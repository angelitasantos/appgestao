<?php permissaoCatalogosPagina(1); ?>

<div class="box-content">
    <h3><i class="fa fa-plus"></i> Adicionar Categoria</h3>

    <div class="right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-categorias-listar"><button class="btn btn-sm btn-success" type="button">Lista Categorias</button></a></div>
    </div>

    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
            if (isset($_POST['acao'])) {

                $CIN = $_SESSION['CIN'];
                $descricao = $_POST['descricao'];

                if ($descricao == '') {
                    Painel::alert('erro', 'Campos vazios não são permitidos!');
                } else {
                    $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_cad.categorias` WHERE CIN = ? AND descricao = ?");
					$verificar->execute(array($_SESSION['CIN'],$_POST['descricao']));
					if($verificar->rowCount() == 0){

                    $slug = PHP::generateSlug($descricao);
                    $array = ['CIN'=>$_SESSION['CIN'],'descricao'=>$descricao,'slug'=>$slug,'nome_tabela'=>'tb_cad.categorias'];
                    if(PHP::insertOne($array)){
                        PHP::redirect(INCLUDE_PATH_PAINEL.'cad-categorias-adicionar?sucesso');
                    }
                    }else{
                        Painel::alert("erro",'Já existe um registro com esta descrição!');
                    }
                }
            }
            if(isset($_GET['sucesso']))
            Painel::alert('sucesso', 'Cadastro efetuado com sucesso!');
        ?>

        <div class="">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label>Descrição:</label>
                <input class="form-control" type="text" name="descricao">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
                <input type="submit" name="acao" value="Cadastrar" class="btn btn-sm btn-success">
        </div>

    </form>

</div>
<!--box-content-->