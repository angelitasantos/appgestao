<?php verificaPermissaoPagina(2); ?>

<div class="box-content">
    <h1><i class="fa fa-plus"></i> Adicionar Usuário</h1>
</div>

<div class="box-content">
    
    <div class="box-metricas right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-listar"><button class="" type="button">Lista Usuários</button></a></div>
    </div><!--box-metricas-->
    <div class="clear"></div><!-- clear -->
    
    <div class="box-metricas">
        <form method="post" enctype="multipart/form-data">

            <?php 
                if(isset($_POST['acao'])){
                    //Dados Tabela Usuários
                    $CIN = $_SESSION['CIN'];
                    $usuario = $_POST['usuario'];
                    $nome = $_POST['nome'];
                    $sobrenome = $_POST['sobrenome'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $avatar = '';
                    $tipousuario = $_POST['tipousuario'];
                    $dataregistro = date('Y/m/d H:i:s');
                    $site = '0';
                    $dashboard = $_POST['dashboard'];
                    $simulador = $_POST['simulador'];
                    $financeiro = $_POST['financeiro'];
                    $vendas = $_POST['vendas'];
                    $catalogos = $_POST['catalogos'];
                    $operacional = $_POST['operacional'];
                    $relatorios = $_POST['relatorios'];
                
                    if($email == ''){
                        echo '<div class="erro-box"><i class="fa fa-times"></i> O campo email está vazio!</div>';
                    }else if($usuario == ''){
                        echo '<div class="erro-box"><i class="fa fa-times"></i> O campo usuario está vazio!</div>';
                    }else if($senha == ''){
                        echo '<div class="erro-box"><i class="fa fa-times"></i> O campo senha está vazio!</div>';
                    }else{
                        if($tipousuario >= '3'){
                            echo '<div class="erro-box"><i class="fa fa-times"></i> O tipo de acesso está incorreto. Entre em contato com o administrador!</div>';
                        }else if(Usuario::existsEmail($email)){
                            echo '<div class="erro-box"><i class="fa fa-times"></i> E-mail '.$email.' já está cadastrado no site!</div>';
                        }else if(Usuario::existsUser($usuario)){
                            echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário '.$usuario.' já está cadastrado no site!</div>';
                        }else{
                            $usuarioadm = new Usuario();
                            $usuarioadm->insertUser(
                                $CIN,$usuario,$nome,$sobrenome,$email,
                                $senha,$avatar,$tipousuario,$dataregistro,$site,
                                $dashboard,$simulador,$financeiro,$vendas,$catalogos,
                                $operacional,$relatorios);
                            echo '<div class="sucesso-box"><i class="fa fa-check"></i> Cadastro do usuário '.$usuario.' efetuado com sucesso!</div>';
                        }
                    }
                }
            ?>

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <label>E-mail:</label>
                            <input type="text" name="email">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Usuário:</label>
                            <input type="text" name="usuario">
                        </div>
                    </div>
                </div>
            </div><!-- email / usuario -->

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <label>Senha:</label>
                            <input type="password" name="senha">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Tipo Usuário:</label>
                            <select name="tipousuario">
                                <?php 
                                    foreach (Site::$tipoAcesso as $key => $value) {
                                        if($key < $_SESSION['tipousuario']) echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- senha / tipousuario -->

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                            <label>Nome:</label>
                            <input type="text" name="nome">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Sobrenome:</label>
                            <input type="text" name="sobrenome">
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
                <input type="submit" name="acao" value="Cadastrar">
            </div><!--form-group-->
        </form><!--form-->
    </div><!--box-metricas-->

</div><!--box-content-->