<?php 
    verificaPermissaoPagina(2); 

    if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
        PHP::deleteOne('tb_adm.usuarios',$idExcluir);
        PHP::redirect(INCLUDE_PATH_PAINEL.'adm-user-listar');
    }
    
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 10;
	
	$usuario = PHP::selectAllCIN('tb_adm.usuarios',($paginaAtual - 1) * $porPagina,$porPagina);
?>

<div class="box-content">
    <h1><i class="fa fa-bars"></i> Lista Usuários Cadastrados</h1>
</div><!--box-content-->

<div class="box-content">

    <div class="box-metricas right">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-adicionar"><button class="" type="button">Adicionar Usuários</button></a></div>
    </div><!--box-metricas-->
    <div class="clear"></div><!-- clear -->

    <div class="box-metricas">
        <div class="wraper-table">

            <div class="clear"></div><!-- clear -->

            <table>
                <tr>
                    <td>Usuário</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>Tipo usuário</td>
                    <td>Data Registro</td>
                    <td>#</td>
                </tr>

                <?php

                foreach ($usuario as $key => $value) {

                ?>

                    <tr>
                        <td><?php echo $value['usuario']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['sobrenome']; ?></td>
                        <td><span><?php echo selecionarTipoUsuario($value['tipousuario']); ?></span></td>
                        <td><span><?php echo date('d/m/Y H:i:s',strtotime($value['dataregistro'])) ?></span></td>
                        <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-listar?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></a></td>
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