<?php
$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.adm_config`");
$infoSite->execute();
$infoSite = $infoSite->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7,edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php echo $infoSite['titulo']; ?></title>
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>assets/images/logo.png" type="image/x-icon" />

    <script src="https://kit.fontawesome.com/f7cb610b49.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/responsive.css">
</head>

<body>
    <base base="<?php echo INCLUDE_PATH; ?>" />

    <header class="fixed-top bg-yellow-green">
        <div class="container-fluid">
            <div class="logo left"><a href="<?php echo INCLUDE_PATH; ?>"><?php echo $infoSite['titulo']; ?></a></div>
            <nav class="desktop right">
                <ul>
                    <li><a title="Home" href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a title="Contato" href="<?php echo INCLUDE_PATH; ?>#contato">Contato</a></li>
                    <li><a title="Painel" href="<?php echo INCLUDE_PATH; ?>painel">Painel</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <ul>
                    <li><a title="Home" href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#quemsomos">Equipe</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#planos">Planos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#artigos">Artigos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>#contato">Contato</a></li>
                    <li><a title="Painel" href="<?php echo INCLUDE_PATH; ?>painel">Painel</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
            <!--clear-->
        </div>
        <!--container-fluid-->
    </header>