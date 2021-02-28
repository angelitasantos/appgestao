<?php verificaPermissaoPagina(0); ?>

<div class="box-content">
    <h1><i class="fa fa-pen"></i> Editar Usuário Logado</h1>
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
                    //Enviar o formulário
                    $nome = $_POST['nome'];
                    $sobrenome = $_POST['sobrenome'];
				    $senha = $_POST['senha'];
				    $avatar = $_FILES['avatar'];
                    $avatar_atual = $_POST['avatar_atual'];
                    $usuario = new Usuario();
                    if($avatar['name'] != ''){
                        //Existe um upload de imagem
                        if(Painel::validImage($avatar)){
                            Painel::deleteFile($avatar_atual);
                            $avatar = Painel::uploadFile($avatar);
                            if($usuario->updateUser($nome,$sobrenome,$senha,$avatar)){
                                $_SESSION['avatar'] = $avatar;
                                Painel::alert('sucesso','Imagem atualizada com sucesso!');
                                Usuario::redirectUser();
                            }else{
                                Painel::alert('erro','Ocorreu um erro ao atualizar a imagem');
                            }
                        }else{
                            Painel::alert('erro','O formato da imagem não é válido');
                        }                            
                    //Não existe um upload de imagem    
                    }else{
                        $avatar = $avatar_atual;
                        if($usuario->updateUser($nome,$sobrenome,$senha,$avatar)){
                            Painel::alert('sucesso','Cadastro alterado com sucesso!');
                            Usuario::redirectUser();
                        }else{
                            Painel::alert('erro','Ocorreu um erro ao atualizar!');
                        }
                    }
                    
                }
            ?>

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                        <label>Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                        <label>Sobrenome:</label>
                        <input class="form-control" type="text" name="sobrenome" value="<?php echo $_SESSION['sobrenome']; ?>">
                        </div>
                    </div>
                </div>
            </div><!-- nome / sobrenome -->

            <div class="form-row">
                <div class="col-6">
                    <div>
                        <div>
                        <label>Senha:</label>
                        <input class="form-control" type="password" name="senha" value="<?php echo $_SESSION['senha']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <div>
                            <label>Imagem:</label>
                            <input type="file" name="avatar"/>
                            <input type="hidden" name="avatar_atual" value="<?php echo $_SESSION['avatar'] ?>">
                        </div>
                    </div>
                </div>
            </div><!-- senha / avatar -->

            <div class="form-group center">
                <input type="submit" name="acao" value="Atualizar">
            </div><!--form-group-->
            
        </form><!--form-->
        <div class="clear"></div><!-- clear -->
    </div><!--box-metricas-->
    <div class="clear"></div><!-- clear -->

</div><!--box-content-->