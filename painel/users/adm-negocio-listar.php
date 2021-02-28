<?php
verificaPermissaoPaginaSite(1);

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;

$negocio = PHP::selectAll('tb_adm.negocios', ($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content">
    <h3><i class="fa fa-bars"></i> Lista Negócios</h3>

    <div class="right mb-3">
        <div><a href="<?php echo INCLUDE_PATH_PAINEL ?>adm-negocio-editar"><button class="btn btn-sm btn-success" type="button">Editar Negócio</button></a></div>
    </div>
    <div class="clear"></div><!-- clear -->

    <div class="container-fluid table-responsive">

        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>CIN</th>
                    <th>Nome Conhecido</th>
                    <th>Razão Social</th>
                    <th>Contato</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <?php

            foreach ($negocio as $key => $value) {

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $value['CIN']; ?></td>
                        <td><?php echo $value['nomeconhecido']; ?></td>
                        <td><?php echo $value['razaosocial']; ?></td>
                        <td><?php echo $value['contato']; ?></td>
                        <td><?php echo $value['celular1']; ?></td>
                    </tr>
                </tbody>
            <?php } ?>

        </table>

        <div class="paginacao">
            <?php
            $totalPaginas = ceil(count(PHP::selectAll('tb_adm.negocios')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaAtual)
                    echo '<a class="page-selected" href="' . INCLUDE_PATH_PAINEL . 'adm-negocio-listar?pagina=' . $i . '">' . $i . '</a>';
                else
                    echo '<a href="' . INCLUDE_PATH_PAINEL . 'adm-negocio-listar?pagina=' . $i . '">' . $i . '</a>';
            }

            ?>

        </div>
        <!--paginacao-->

    </div>
    <!--container-fluid-->

</div><!-- content -->