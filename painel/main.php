<?php
if (isset($_GET['loggout'])) {
    Painel::loggout();
}
$usuarioLogado = PHP::selectOne('tb_adm.usuarios', false);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7,edge,chrome=1">
    <title>Painel de Controle</title>
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>assets/images/logo.png" type="image/x-icon" />

    <!-- Font Awesome, Google Font, CSS -->
    <script src="https://kit.fontawesome.com/f7cb610b49.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/responsive.css">
</head>

<body>

    <base base="<?php echo INCLUDE_PATH_PAINEL; ?>" />

    <div class="menu bg-success">


            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand" href="">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Escritório</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a <?php permissaoDashboardMenu(1); ?> class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li><!-- Nav Item - Dashboard -->

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Operacional
                </div>

                <li class="nav-item">
                    <a <?php permissaoVendasMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cart-arrow-down"></i>
                        <span>Vendas</span>
                    </a>
                    <div id="collapse01" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Comercial</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Clientes</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Pedido de Venda</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Ordem de Serviço</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Devoluções e Trocas</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Comissões</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Vendas -->

                <li class="nav-item">
                    <a <?php permissaoEstoqueMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Estoque</span>
                    </a>
                    <div id="collapse02" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Armazém</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Movimentações</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Inventário</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Itens</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad-produtos-listar">Produtos</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad-servicos-listar">Serviços</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad-categorias-listar">Categorias</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad-unmeds-listar">Unidades Medida</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Estoque -->

                <li class="nav-item">
                    <a <?php permissaoComprasMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Compras</span>
                    </a>
                    <div id="collapse03" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Negociações:</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Fornecedores</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Pedido de Compra</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Serviço Requisitado</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Cotações</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Compras -->

                <li class="nav-item">
                    <a <?php permissaoProducaoMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-industry"></i>
                        <span>Produção</span>
                    </a>
                    <div id="collapse04" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">PCP:</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Ordem de Produção</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Manutenção</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Segurança</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Qualidade</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Produção -->

                <li class="nav-item">
                    <a <?php permissaoFinanceiroMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cash-register"></i>
                        <span>Financeiro</span>
                    </a>
                    <div id="collapse05" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Análise:</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Caixa e Bancos</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Recebimentos</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Pagamentos</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Financeiro -->

                <li class="nav-item">
                    <a <?php permissaoRelatoriosMenu(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Relatórios</span>
                    </a>
                    <div id="collapse06" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Controles e Registros:</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Financeiros</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Gerenciais</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">Operacionais</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Relatórios -->

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a <?php permissaoSimuladorMenu(1); ?> class="nav-link" href="<?php echo INCLUDE_PATH_PAINEL; ?>cad">
                        <i class="fas fa-fw fa-calculator"></i>
                        <span>Simulador</span></a>
                </li><!-- Nav Item - Simulador -->

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Configurações
                </div>

                <li class="nav-item">
                    <a <?php verificaPermissaoMenu(0); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePainel" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Painel</span>
                    </a>
                    <div id="collapsePainel" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Usuários</h6>
                            <a class="collapse-item" <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-listar">Listar Usuários</a>
                            <a class="collapse-item" <?php verificaPermissaoMenu(0); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-editar">Editar Usuário</a>
                            <a class="collapse-item" <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-adicionar">Adicionar Usuário</a>
                            <a class="collapse-item" <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adm-user-permissoes">Permissões de Usuário</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Negócio</h6>
                            <a class="collapse-item" <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adm-negocio-editar">Dados do Negócio</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Administração do Painel -->

                <li class="nav-item">
                    <a <?php verificaPermissaoSite(1); ?> class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSite" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Site</span>
                    </a>
                    <div id="collapseSite" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Negócios</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>adm-negocio-listar">Listar Negócios</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-config-editar">Editar Site</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site">Estatísticas Site</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Conteúdo</h6>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-agenda-listar">Agenda</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-clientes-listar">Clientes</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-blog-listar">Blog</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-downloads-listar">Downloads</a>
                            <a class="collapse-item" href="<?php echo INCLUDE_PATH_PAINEL ?>site-podcasts-listar">Podcasts</a>
                        </div>
                    </div>
                </li><!-- Nav Item - Administração do Site -->

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Message -->
                <div class="sidebar-card">
                    <div class="box-usuario">
                        <?php
                        if ($_SESSION['avatar'] == '') {
                        ?>

                            <div class="avatar-usuario">
                                <i class="fa fa-user"></i>
                            </div><!-- avatar-usuario -->

                        <?php } else { ?>
                            <div class="imagem-usuario">
                                <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $usuarioLogado['avatar'] ?>" />
                            </div><!-- imagem-usuario -->
                        <?php } ?>

                        <div class="nome-usuario">
                            <h6><?php echo $usuarioLogado['nome'] ?> <?php echo $usuarioLogado['sobrenome'] ?></h6>
                            <h6><?php echo selecionarTipoUsuario($_SESSION['tipousuario']); ?></h6>
                            <h6>CIN: <?php echo $_SESSION['CIN']; ?></h6>
                        </div><!-- nome-usuario -->
                    </div>
                    <!--box-usuario-->

                </div>

                <!-- Sidebar Message -->
                <div class="sidebar-card">
                    <p class="text-center mb-2">Template adaptado </p>
                    <p><strong>SB Admin <sup>2</sup></strong></p>
                    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-2" target="_blank">Site</a>
                </div>

            </ul><!-- Sidebar / Layout Start Bootstrap SB-admin-2 -->


    </div>
    <!--menu-->

    <header class="bg-success">
        <div class="center">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            <!--menu-btn-->

            <div class="loggout">
                <a <?php if (@$_GET['url'] == '') { ?> class="bg-success" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
            </div>
            <!--loggout-->

            <div class="clear"></div>
        </div>
    </header>

    <div class="content">
        <?php
        Painel::loadPage();
        ?>
    </div>
    <!--content-->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>assets/js/constants.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/scripts.js"></script>
</body>

</html>