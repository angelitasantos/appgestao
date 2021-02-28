<?php
    verificaPermissaoPaginaSite(1);

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 10;
	
    $usuariosPainel = PHP::selectAll('tb_adm.usuarios',($paginaAtual - 1) * $porPagina,$porPagina);
    
    $usuariosOnline = Usuario::selectUsersOnline();

    $visitasTotais = Usuario::selectUsersTotal();
    $visitasHoje = Usuario::selectUsersToday();
?>

<div class="box-content">
    <h1><i class="fa fa-signal"></i> Estatísticas do Site</h1>
</div>

<div class="box-content w100">

    <div class="box-metricas row">
        <div class="box-metrica-single col-4">
            <div class="box-metrica-wraper">
                <h2>Usuários Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single col-4">
            <div class="box-metrica-wraper">
                <h2>Total de Visitas</h2>
                <p><?php echo $visitasTotais; ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single col-4">
            <div class="box-metrica-wraper">
                <h2>Visitas Hoje</h2>
                <p><?php echo $visitasHoje; ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="clear"></div><!-- clear -->
    </div><!--box-metricas-->

</div><!-- usuarios e visitas -->

<div class="box-content w100 left">

    <h2><i class="fa fa-users"></i> Usuários Online no Site</h2>

    <div class="box-metricas">

        <div class="table-responsive">
            <div class="row">
                <div class="w33 left">
                    <span>Usuário</span>
                </div><!--col-->
                <div class="w33 left">
                    <span>Última Ação</span>
                </div><!--col-->
                <div class="clear"></div><!--clear-->
            </div><!--row-->
            
            <?php foreach($usuariosOnline as $key => $value) { ?>

            <div class="row">
                    <div class="w33 left">
                        <span><?php echo $value['IP']; ?></span>
                    </div><!--col-->
                    <div class="w33 left">
                        <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
                    </div><!--col-->
                    <div class="clear"></div><!--clear-->
                </div><!--row-->
            <?php } ?>
        </div><!--table-responsive-->
    
        <div class="clear"></div><!-- clear -->
    </div><!--box-metricas-->
    
</div><!-- usuarios online no site -->

<div class="box-content w100 left">

    <h2><i class="fa fa-users"></i> Usuários do Painel</h2>

    <div class="box-metricas">
        <div class="wraper-table">

        <div class="clear"></div><!-- clear -->

            <table>
                <tr>
                    <td>Empresa</td>
                    <td>Usuário</td>
                    <td>Nome</td>
                    <td>Tipo Usuário</td>
                    <td>Data do Registro</td>
                </tr>

                <?php

                    foreach ($usuariosPainel as $key => $value) {

                ?>

                    <tr>
                        <td><span><?php echo $value['CIN']; ?></span></td>
                        <td><span><?php echo $value['usuario']; ?></span></td>
                        <td><span><?php echo $value['nome']; ?></span></td>
                        <td><span><?php echo selecionarTipoUsuario($value['tipousuario']); ?></span></td>
                        <td><span><?php echo date('d/m/Y H:i:s',strtotime($value['dataregistro'])) ?></span></td>
                    </tr>

                <?php } ?>

            </table>
            
        </div>
        <!--wraper-table-->

        <div class="paginacao">
            <?php
                $totalPaginas = ceil(count(PHP::selectAll('tb_adm.usuarios')) / $porPagina);

                for($i = 1; $i <= $totalPaginas; $i++){
                    if($i == $paginaAtual)
                        echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'site?pagina='.$i.'">'.$i.'</a>';
                    else
                        echo '<a href="'.INCLUDE_PATH_PAINEL.'site?pagina='.$i.'">'.$i.'</a>';
                }

            ?>
          
        </div>
        <!--paginacao-->

    </div>
    <!--box-metricas-->
    
</div><!-- usuarios do painel -->