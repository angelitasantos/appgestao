<?php 
    permissaoCatalogosPagina(1); 

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $itens = PHP::selectOne('tb_cad.itens','id = ?',array($id));
	}else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>

<div class="box-content">
    <h3><i class="fa fa-pen"></i> Editar Serviço</h3>
</div>

<div class="box-content">

    <div class="box-metricas right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>cad-itens-listar"><button class="btn btn-sm btn-success" type="button">Lista Itens</button></a></div>
    </div>
    <!--box-metricas-->

    <div class="clear"></div><!-- clear -->

    <form method="POST" enctype="multipart/form-data">

        <?php
			if(isset($_POST['acao'])){

                $array = array_merge($_POST);

                $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_cad.itens` WHERE CIN = ? AND descricao = ? AND EAN = ? AND id != ?");
				$verificar->execute(array($_SESSION['CIN'],$_POST['descricao'],$_POST['EAN'],$id));
				$info = $verificar->fetch();
				if($verificar->rowCount() == 1){
					Painel::alert("erro",'Já existe um item com esta descrição e este código interno!');
				}else{

				if(PHP::updateOne($array)){
					Painel::alert('sucesso','Item alterado com sucesso!');
                    $itens = PHP::selectOne('tb_cad.itens','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vazios não são permitidos.');
                }
                }
			}
		?>

        <div class="form-group">
            <input type="hidden" name="CIN" value="<?php echo $_SESSION['CIN']; ?>">
        </div><!--form-group-->
        <div class="clear"></div><!-- clear -->

        <div class="row">
            <div class="col-6">
                <label>Tipo Item:</label>
                <input type="text" name="tipoitem" value="<?php echo $itens['tipoitem']; ?>" disabled>
            </div><!--form-group-->
            <div class="col-6">
                <label>Categoria:</label>
                <select name="categoria_id">
                        <?php 
                            $categorias = PHP::selectAllCIN('tb_cad.categorias');
                            foreach ($categorias as $key => $value) {
                        ?>
                        <option <?php if($value['id'] == $itens['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['descricao']; ?></option>
			            <?php } ?>
                </select>
            </div><!--form-group-->
        </div>

        <div class="row">
            <div class="col-12">
                <label>Descrição:</label>
                <input type="text" name="descricao" value="<?php echo $itens['descricao']; ?>">
            </div><!--form-group-->
        </div>

        <div class="row">
            <div class="col-12">
                <label>Código Interno:</label>
                <input type="text" name="EAN" value="<?php echo $itens['EAN']; ?>">
            </div><!--form-group-->
        </div>

        <div class="row">
            <div class="col-12">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nome_tabela" value="tb_cad.itens" />
                <input type="submit" name="acao" value="Editar" class="btn btn-sm btn-success">
            </div><!--form-group-->
        </div>

    </form>

</div><!--box-content-->