<!-- Para funcionar, precisa limpar os cookies do navegador
<?php
Usuario::rememberAccess($usuario, $senha);
?>
-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7,edge,chrome=1">
    <title>Entrar Painel de Controle</title>
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH; ?>assets/images/logo.png" type="image/x-icon">

    <!-- Font Awesome, Google Font, CSS -->
    <script src="https://kit.fontawesome.com/f7cb610b49.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>assets/css/responsive.css">
</head>

<body>

    <div class="box-login">
        <?php
        if (isset($_POST['acao'])) {
            $CIN = $_POST['CIN'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE CIN = ? AND usuario = ? AND senha = ?");
            $sql->execute(array($CIN, $usuario, $senha));
            if ($sql->rowCount() == 1) {
                $info = $sql->fetch();
                //Entrar com sucesso.
                $_SESSION['entrar'] = true;
                $_SESSION['CIN'] = $CIN;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipousuario'] = $info['tipousuario'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['sobrenome'] = $info['sobrenome'];
                $_SESSION['avatar'] = $info['avatar'];
                $_SESSION['site'] = $info['site'];
                $_SESSION['dashboard'] = $info['dashboard'];
                $_SESSION['simulador'] = $info['simulador'];
                $_SESSION['financeiro'] = $info['financeiro'];
                $_SESSION['vendas'] = $info['vendas'];
                $_SESSION['catalogos'] = $info['catalogos'];
                $_SESSION['operacional'] = $info['operacional'];
                $_SESSION['relatorios'] = $info['relatorios'];
                $_SESSION['estoque'] = $info['estoque'];
                $_SESSION['compras'] = $info['compras'];
                $_SESSION['producao'] = $info['producao'];
                if (isset($_POST['lembrar'])) {
                    setcookie('lembrar', true, time() + (60 * 60 * 24), '/');
                    setcookie('user', $user, time() + (60 * 60 * 24), '/');
                    setcookie('password', $password, time() + (60 * 60 * 24), '/');
                }
                PHP::redirect(INCLUDE_PATH_PAINEL);
            } else {
                //Caso ocorra alguma falha ao tentar fazer login
                echo '<div class="erro-box"><i class="fa fa-times"></i> CIN, usuário ou senha incorretos!</div>';
            }
        }
        ?>

        <h3 class="text-center mb-3">Entrar no Painel</h3>
        <form method="POST">
            <input class="form-control mb-2" type="text" name="CIN" placeholder="Código Identificador do Negócio..." required>
            <div class="row">
                <div class="col-sm-6">
                    <input class="form-control mb-2" type="text" name="usuario" placeholder="Usuário..." required>
                </div>
                <div class="col-sm-6">
                    <input class="form-control mb-2" type="password" name="senha" placeholder="Senha..." required>
                </div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-sm-6">
                    <button class="btn btn-sm btn-success" type="submit" name="acao" value="Entrar">Entrar</button>
                </div>
                <div class="col-sm-6">
                    <a class="link-btn" href="<?php echo INCLUDE_PATH; ?>registrar"><button class="btn btn-sm btn-success" type="button">Registrar</button></a>
                </div>
            </div>
            <!--
            <div class="form-group-login right">
                <label>Lembrar</label>
                <input class="check-box" type="checkbox" name="lembrar" />
            </div>
            -->

            <div class="clear"></div><!-- clear -->
        </form><!-- form login -->
    </div><!-- box-login -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/scripts.js"></script>

</body>

</html>