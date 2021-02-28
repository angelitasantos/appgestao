<?php
verificaPermissaoPagina(2);
$site = PHP::selectOneCIN('tb_adm.negocios', false);
?>

<div class="box-content">
    <h3><i class="fa fa-pen"></i> Editar Dados do Negócio</h3>

    <div class="pt-5">
        <form method="POST" class="form-registro-editar">

            <?php
            if (isset($_POST['acao'])) {
                //Dados tabela negócio a ser atualizados
                //$CIN = date('YmdHisa');
                //$email = $_POST['email'];
                //$usuario = $_POST['usuario'];
                //$senha = $_POST['senha'];
                $razaosocial = $_POST['razaosocial'];
                $nomeconhecido = $_POST['nomeconhecido'];
                $endereco = $_POST['endereco'];
                $numero = $_POST['numero'];
                $complemento = $_POST['complemento'];
                $cep = $_POST['cep'];
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
                //$uf = $_POST['uf'];
                $contato = $_POST['contato'];
                $celular1 = $_POST['celular1'];
                $celular2 = $_POST['celular2'];
                $telefone = $_POST['telefone'];
                //$ramoatividade = $_POST['ramoatividade'];
                $cnpj = $_POST['cnpj'];
                $inscest = $_POST['inscest'];
                $inscmun = $_POST['inscmun'];
                //$dataregistro = date('Y/m/d H:i:s');

                if ($nomeconhecido == '') {
                    echo '<div class="erro-box"><i class="fa fa-times"></i> O campo nomeconhecido está vazio!</div>';
                } else if ($cidade == '') {
                    echo '<div class="erro-box"><i class="fa fa-times"></i> O campo cidade está vazio!</div>';
                } else if ($celular1 == '') {
                    echo '<div class="erro-box"><i class="fa fa-times"></i> O campo celular1 está vazio!</div>';
                } else {
                    $negocio = new Negocio();
                    $negocio->updateBusiness(
                        $razaosocial,
                        $nomeconhecido,
                        $endereco,
                        $numero,
                        $complemento,
                        $cep,
                        $bairro,
                        $cidade,
                        $contato,
                        $celular1,
                        $celular2,
                        $telefone,
                        $cnpj,
                        $inscest,
                        $inscmun
                    );
                    echo '<div class="sucesso-box"><i class="fa fa-check"></i> Alterações nos dados de ' . $nomeconhecido . ' efetuadas com sucesso!</div>';
                    $site = PHP::selectOneCIN('tb_adm.negocios', false);
                }
            }
            ?>

            <div class="row">
                <div class="col-sm-12 col-sm-6">
                    <label class="mt-2">Razão Social</label>
                    <input value="<?php echo strtoupper($site['razaosocial']) ?>" class="form-control" placeholder="razao social..." type="text" name="razaosocial" maxlength="60">
                </div><!-- razao social -->

                <div class="col-sm-12 col-sm-6">
                    <label class="mt-2">Nome Conhecido</label>
                    <input class="form-control" value="<?php echo strtoupper($site['nomeconhecido']) ?>" placeholder="nome conhecido..." type="text" name="nomeconhecido" maxlength="40">
                </div><!-- nome conhecido -->

                <div class="col-sm-12 col-md-6">
                    <label class="mt-2">Endereço</label>
                    <input class="form-control" value="<?php echo strtoupper($site['endereco']) ?>" placeholder="endereco..." type="text" name="endereco" maxlength="60">
                </div><!-- endereco -->

                <div class="col-sm-6 col-md-3">
                    <label class="mt-2">Número</label>
                    <input class="form-control" value="<?php echo strtoupper($site['numero']) ?>" placeholder="numero..." type="text" name="numero" maxlength="15">
                </div><!-- numero -->

                <div class="col-sm-6 col-md-3">
                    <label class="mt-2">Complemento</label>
                    <input class="form-control" value="<?php echo strtoupper($site['complemento']) ?>" placeholder="complemento..." type="text" name="complemento" maxlength="15">
                </div><!-- complemento -->

                <div class="col-sm-12 col-sm-6">
                    <label class="mt-2">Bairro</label>
                    <input class="form-control" value="<?php echo strtoupper($site['bairro']) ?>" placeholder="bairro..." type="text" name="bairro" maxlength="40">
                </div><!-- bairro -->

                <div class="col-sm-12 col-sm-6">
                    <label class="mt-2">Cidade</label>
                    <input class="form-control" value="<?php echo strtoupper($site['cidade']) ?>" placeholder="cidade..." type="text" name="cidade" maxlength="40">
                </div><!-- cidade -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">CEP</label>
                    <input class="form-control" value="<?php echo $site['cep'] ?>" placeholder="cep..." type="text" name="cep" maxlength="15">
                </div><!-- cep  -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">CNPJ</label>
                    <input class="form-control" value="<?php echo $site['cnpj'] ?>" placeholder="cnpj" type="text" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)">
                </div><!-- cnpj -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Insc.Est.</label>
                    <input class="form-control" value="<?php echo $site['inscest'] ?>" placeholder="inscrição estadual" type="text" name="inscest" maxlength="16">
                </div><!-- insc.estadual -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Insc.Munic.</label>
                    <input class="form-control" value="<?php echo $site['inscmun'] ?>" placeholder="inscrição municipal" type="text" name="inscmun" maxlength="14">
                </div><!-- insc.municipal -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Contato</label>
                    <input class="form-control" value="<?php echo strtoupper($site['contato']) ?>" placeholder="contato..." type="text" name="contato" maxlength="15">
                </div><!-- contato -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Celular 1</label>
                    <input class="form-control" value="<?php echo $site['celular1'] ?>" placeholder="celular 1..." type="text" name="celular1" maxlength="14" OnKeyPress="formatar('##-#####-####', this)">
                </div><!-- celular1 -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Celular 2</label>
                    <input class="form-control" value="<?php echo $site['celular2'] ?>" placeholder="celular 2..." type="text" name="celular2" maxlength="14" OnKeyPress="formatar('##-#####-####', this)">
                </div><!-- celular2 -->

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <label class="mt-2">Telefone</label>
                    <input class="form-control" value="<?php echo $site['telefone'] ?>" placeholder="telefone..." type="text" name="telefone" maxlength="13" OnKeyPress="formatar('##-####-####', this)">
                </div><!-- telefone -->

                

            </div>

            <div class="row">
                <div class="col-sm-3">
                    <a><button type="submit" name="acao" class="btn btn-sm btn-success mt-3">Alterar</button></a>
                </div>
            </div><!-- botões -->

        </form>
    </div>
    <!--center-->

</div>
<!--contato-container-->