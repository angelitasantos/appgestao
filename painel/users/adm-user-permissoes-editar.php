<?php 
    verificaPermissaoPagina(2);

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $usuarios = PHP::selectOne('tb_adm.usuarios','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
}

?>

<div class="box-content">
    <h1><i class="fa fa-plus"></i> Alterar Permissões do Usuário</h1>
</div>

<div class="box-content">
    
    <div class="box-metricas right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-permissoes"><button class="" type="button">Lista Permissões</button></a></div>
    </div><!--box-metricas-->
    <div class="clear"></div><!-- clear -->
    
    <div class="box-metricas">
        <form method="post" enctype="multipart/form-data">

            <?php
                if(isset($_POST['acao'])){
                    if(PHP::updateOne($_POST)){
                        Painel::alert('sucesso','Usuário alterado com sucesso!');
                        $usuarios = PHP::selectOne('tb_adm.usuarios','id = ?',array($id));
                    }else{
                        Painel::alert('erro','Campos vazios não são permitidos.');
                    }
                }
            ?>

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <label>E-mail:</label>
                            <input type="text" name="email" value="<?php echo $usuarios['email']; ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Usuário:</label>
                            <input type="text" name="usuario" value="<?php echo $usuarios['usuario']; ?>" disabled>
                        </div>
                    </div>
                </div>
            </div><!-- email / usuario -->

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <input type="hidden" name="senha" value="<?php echo $usuarios['senha']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <input type="hidden" name="tipousuario" value="<?php echo $usuarios['tipousuario']; ?>">
                        </div>
                    </div>
                </div>
            </div><!-- senha / tipousuario -->

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <label>Nome:</label>
                            <input type="text" name="nome" value="<?php echo $usuarios['nome']; ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Sobrenome:</label>
                            <input type="text" name="sobrenome" value="<?php echo $usuarios['sobrenome']; ?>" disabled>
                        </div>
                    </div>
                </div>
            </div><!-- nome / sobrenome -->

            <br><hr>
            <div class="form-group ">
                <label><i class="fa fa-check"></i> Definir Permissões para o Usuário</label>
            </div><!--form-group-->                

            <div class="form-row">
                <div class="col-3">
                    <div>
                        <div>
                            <label>Simulador:</label>
                            <select name="simulador">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <label>Dashboard:</label>
                            <select name="dashboard">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <label>Financeiro:</label>
                            <select name="financeiro">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <label>Vendas:</label>
                            <select name="vendas">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- simulador / dashboard / financeiro / vendas -->

            <div class="form-row">
                <div class="col-3">
                    <div>
                        <div>
                            <label>Cadastros:</label>
                            <select name="catalogos">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <label>Relatórios:</label>
                            <select name="relatorios">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div>
                            <label>Operacional: </label>
                            <select name="operacional">
                                <?php 
                                    foreach (Site::$tipoPermissao as $key => $value) {
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- cadastros / relatórios / operacional -->

            <div class="form-group center">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nome_tabela" value="tb_adm.usuarios" /> 
                <input type="submit" name="acao" value="Alterar">
            </div><!--form-group-->
        </form><!--form-->
    </div><!--box-metricas-->

</div><!--box-content-->