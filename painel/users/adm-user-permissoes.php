<?php 
    verificaPermissaoPagina(2); 
    
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 10;
	
	$usuario = PHP::selectAllCIN('tb_adm.usuarios',($paginaAtual - 1) * $porPagina,$porPagina);
?>
<div class="box-content">
    <h1><i class="fa fa-pen"></i> Alterar Permissões dos Usuários</h1>
</div>

<div class="box-content">

    <div class="box-metricas right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-adicionar"><button class="" type="button">Adicionar Usuário</button></a></div>
    </div><!--box-metricas-->
    <div class="clear"></div><!-- clear -->

    <div class="box-metricas">
        <div class="wraper-table">

            <div class="clear"></div><!-- clear -->

            <table>
                <tr>
                    <td>Usuário</td>
                    <td>Nome</td>
                    <td>Tipo usuário</td>
                    <td>Dashboard</td>
                    <td>Simulador</td>
                    <td>Financeiro</td>
                    <td>Vendas</td>
                    <td>Cadastros</td>
                    <td>Operacional</td>
                    <td>Relatórios</td>
                    <td>#</td>
                </tr>

                <?php

                foreach ($usuario as $key => $value) {

                ?>

                    <tr>
                        <td><?php echo $value['usuario']; ?></td>
                        <td><?php echo $value['nome']; ?> <?php echo $value['sobrenome']; ?></td>
                        <td><span><?php echo selecionarTipoUsuario($value['tipousuario']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['dashboard']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['simulador']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['financeiro']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['vendas']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['catalogos']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['operacional']); ?></span></td>
                        <td><span><?php echo selecionarTipoPermissao($value['relatorios']); ?></span></td>
                        <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-permissoes-editar?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                    </tr>

                <?php } ?>

            </table>

        </div>
        <!--wraper-table-->

        <div class="paginacao">
            <?php
                $totalPaginas = ceil(count(PHP::selectAllCIN('tb_adm.usuarios')) / $porPagina);

                for ($i = 1; $i <= $totalPaginas; $i++) {
                    if ($i == $paginaAtual)
                        echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'adm-user-listar?pagina=' . $i . '">' . $i . '</a>';
                    else
                        echo '<a href="' . INCLUDE_PATH_PAINEL . 'adm-user-listar?pagina=' . $i . '">' . $i . '</a>';
                }

            ?>
        </div><!--paginacao-->

    </div><!--box-metricas-->

</div><!--box-content-->