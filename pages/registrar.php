<?php
date_default_timezone_set('America/Sao_Paulo')
?>

<div class="pt-5">

    <h4 class="pt-3">Cadastrar um novo negócio</h4>
    <h6>* Dados obrigatórios:</h6>

    <?php
    if (isset($_POST['acao'])) {
        //Dados Tabela Negócio
        $CIN = date('YmdHisa');
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $razaosocial = $_POST['razaosocial'];
        $nomeconhecido = $_POST['nomeconhecido'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $contato = $_POST['contato'];
        $celular1 = $_POST['celular1'];
        $celular2 = $_POST['celular2'];
        $telefone = $_POST['telefone'];
        $ramoatividade = $_POST['ramoatividade'];
        $cnpj = $_POST['cnpj'];
        $inscest = $_POST['inscest'];
        $inscmun = $_POST['inscmun'];
        $dataregistro = date('Y/m/d H:i:s');

        //Dados Tabela Usuários
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $avatar = '';
        $tipousuario = '2';
        $site = '0';
        $dashboard = '1';
        $simulador = '0';
        $financeiro = '1';
        $vendas = '1';
        $catalogos = '1';
        $operacional = '1';
        $relatorios = '1';

        //Dados Tabela Usuários
        $descricao = 'GERAL';
        $slug = 'geral';

        if ($email == '') {
            echo '<div class="erro-box"><i class="fa fa-times"></i> O campo email está vazio!</div>';
        } else if ($usuario == '') {
            echo '<div class="erro-box"><i class="fa fa-times"></i> O campo usuario está vazio!</div>';
        } else if ($senha == '') {
            echo '<div class="erro-box"><i class="fa fa-times"></i> O campo senha está vazio!</div>';
        } else {
            if ($ramoatividade == '0') {
                echo '<div class="erro-box"><i class="fa fa-times"></i> Escolha uma opção no campo ramo de atividade.</div>';
            } else if ($uf == '0') {
                echo '<div class="erro-box"><i class="fa fa-times"></i> Escolha uma opção no campo UF.</div>';
            } else if ($tipousuario >= '3') {
                echo '<div class="erro-box"><i class="fa fa-times"></i> O tipo de acesso está incorreto. Entre em contato com o administrador!</div>';
            } else if (Negocio::existsBusiness($email)) {
                echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ' . $email . ' já está cadastrado no site!</div>';
            } else {
                $negocio = new Negocio();
                $usuarioadm = new Usuario();
                $categoria = new Negocio();
                $negocio->insertBusiness(
                    $CIN,
                    $email,
                    $usuario,
                    $senha,
                    $razaosocial,
                    $nomeconhecido,
                    $endereco,
                    $numero,
                    $complemento,
                    $cep,
                    $bairro,
                    $cidade,
                    $uf,
                    $contato,
                    $celular1,
                    $celular2,
                    $telefone,
                    $ramoatividade,
                    $cnpj,
                    $inscest,
                    $inscmun,
                    $dataregistro
                );
                $usuarioadm->insertUser(
                    $CIN,
                    $usuario,
                    $nome,
                    $sobrenome,
                    $email,
                    $senha,
                    $avatar,
                    $tipousuario,
                    $dataregistro,
                    $site,
                    $dashboard,
                    $simulador,
                    $financeiro,
                    $vendas,
                    $catalogos,
                    $operacional,
                    $relatorios
                );
                $categoria->insertGeral(
                    $CIN,
                    $descricao,
                    $slug
                );
                PHP::redirect(INCLUDE_PATH . 'registrar?sucesso');
            }
        }
    }
    if (isset($_GET['sucesso']))
        echo '<div class="sucesso-box"><i class="fa fa-check"></i> Cadastro do usuário efetuado com sucesso!
        <p>Em até 24 horas você receberá um Código Identificador (CIN) no seu e-mail para acessar o painel!</p></div>';
    ?>

    <div class="container-fluid">
        <form method="POST" class="form-group">

            <div class="row form-group">

                <div class="col-sm-6 col-md-6">
                    <label class="mt-2">Email *</label>
                    <input class="form-control" placeholder="e-mail..." type="email" name="email" maxlength="50" value="<?php recoverPost('email'); ?>">
                </div><!-- email -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Nome</label>
                    <input class="form-control" placeholder="nome..." type="text" name="nome" maxlength="50" value="<?php recoverPost('nome'); ?>">
                </div><!-- nome -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Sobrenome</label>
                    <input class="form-control" placeholder="sobrenome..." type="text" name="sobrenome" maxlength="50" value="<?php recoverPost('sobrenome'); ?>">
                </div><!-- sobrenome -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Usuário *</label>
                    <input class="form-control" placeholder="usuario..." type="text" name="usuario" maxlength="50" value="<?php recoverPost('usuario'); ?>">
                </div><!-- usuario -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Senha *</label>
                    <input class="form-control" placeholder="senha..." type="password" name="senha" maxlength="50" <?php recoverPost('senha'); ?>>
                </div><!-- senha -->

                <div class="col-sm-6 col-md-6">
                    <label class="mt-2">Nome Conhecido</label>
                    <input class="form-control" placeholder="nome conhecido..." type="text" name="nomeconhecido" maxlength="40" value="<?php recoverPost('nomeconhecido'); ?>">
                </div><!-- nome conhecido -->

                <div class="col-sm-6 col-md-6">
                    <label class="mt-2">Razão Social</label>
                    <input class="form-control" placeholder="razao social..." type="text" name="razaosocial" maxlength="60" value="<?php recoverPost('razaosocial'); ?>">
                </div><!-- razao social -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Ramo</label>
                    <select class="form-control" name="ramoatividade">
                        <?php
                        foreach (Site::$tipoAtividade as $key => $value) {
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div><!-- ramo de atividade -->

                <div class="col-sm-3 col-md-3">
                    <label class="mt-2">Contato</label>
                    <input class="form-control" placeholder="contato..." type="text" name="contato" maxlength="15" value="<?php recoverPost('contato'); ?>">
                </div><!-- contato -->

                <div class="col-sm-6 col-md-12 col-lg-6">
                    <label class="mt-2">Endereço</label>
                    <input class="form-control" placeholder="endereco..." type="text" name="endereco" maxlength="60" value="<?php recoverPost('endereco'); ?>">
                </div><!-- endereco -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Número</label>
                    <input class="form-control" placeholder="numero..." type="text" name="numero" maxlength="15" value="<?php recoverPost('numero'); ?>">
                </div><!-- numero -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Complemento</label>
                    <input class="form-control" placeholder="complemento..." type="text" name="complemento" maxlength="15" value="<?php recoverPost('complemento'); ?>">
                </div><!-- complemento -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">CEP</label>
                    <input class="form-control" placeholder="cep..." type="text" name="cep" maxlength="15" value="<?php recoverPost('cep'); ?>">
                </div><!-- cep -->

                <div class="col-sm-5 col-md-5">
                    <label class="mt-2">Bairro</label>
                    <input class="form-control" placeholder="bairro..." type="text" name="bairro" maxlength="40" value="<?php recoverPost('bairro'); ?>">
                </div><!-- bairro -->

                <div class="col-sm-5 col-md-5">
                    <label class="mt-2">Cidade</label>
                    <input class="form-control" placeholder="cidade..." type="text" name="cidade" maxlength="40" value="<?php recoverPost('cidade'); ?>">
                </div><!-- cidade -->

                <div class="col-sm-2 col-md-2">
                    <label class="mt-2">UF</label>
                    <select class="form-control" name="uf">
                        <?php
                        foreach (Site::$estados as $key => $value) {
                            echo '<option value="' . $key . '">' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div><!-- uf -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Celular 1</label>
                    <input class="form-control" placeholder="celular 1..." type="text" name="celular1" maxlength="14" OnKeyPress="formatar('##-#####-####', this)" value="<?php recoverPost('celular1'); ?>">
                </div><!-- celular1 -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Celular 2</label>
                    <input class="form-control" placeholder="celular 2..." type="text" name="celular2" maxlength="14" OnKeyPress="formatar('##-#####-####', this)" value="<?php recoverPost('celular2'); ?>">
                </div><!-- celular2 -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Telefone</label>
                    <input class="form-control" placeholder="telefone..." type="text" name="telefone" maxlength="13" OnKeyPress="formatar('##-####-####', this)" value="<?php recoverPost('telefone'); ?>">
                </div><!-- telefone -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">CNPJ</label>
                    <input class="form-control" placeholder="cnpj" type="text" name="cnpj" maxlength="20" OnKeyPress="formatar('##.###.###/####-##', this)" value="<?php recoverPost('cnpj'); ?>">
                </div><!-- cnpj -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Insc.Est.</label>
                    <input class="form-control" placeholder="inscrição estadual" type="text" name="inscest" maxlength="16" value="<?php recoverPost('inscest'); ?>">
                </div><!-- insc.estadual -->

                <div class="col-sm-6 col-md-4 col-lg-2">
                    <label class="mt-2">Insc.Munic.</label>
                    <input class="form-control" placeholder="inscrição municipal" type="text" name="inscmun" maxlength="14" value="<?php recoverPost('inscmun'); ?>">
                </div><!-- insc.municipal -->

            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <a><button type="submit" name="acao" class="btn btn-sm btn-success my-3">Cadastrar negócio</button></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <a href="<?php echo INCLUDE_PATH ?>painel"><button type="button" class="btn btn-sm btn-success my-3">Já tenho cadastro</button></a>
                </div>
            </div><!-- botões -->


        </form>
    </div>
    <!--center-->

</div>
<!--contato-container-->