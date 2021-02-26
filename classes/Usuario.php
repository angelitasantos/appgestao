<?php

    class Usuario {

        //Listar usuários online
        public static function selectUsersOnline() {
			self::clearUsersOnline();
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios_online`");
			$sql->execute();
			return $sql->fetchAll();
		}// Fim da Função selectUsersOnline


        //Limpar a tabela de usuários para não incluir registro em duplicidade
		public static function clearUsersOnline() {
			$date = date('Y-m-d H:i:s');
			$sql = MySql::conectar()->exec("DELETE FROM `tb_adm.usuarios_online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        }// Fim da Função clearUsersOnline
        

        //Atualizar a hora que o usuário esta acessando o site
        public static function updateUserOnline() {
            if(isset($_SESSION['online'])) {
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $check = MySql::conectar()->prepare("SELECT `id` FROM `tb_adm.usuarios_online` WHERE token = ?");
                $check->execute(array($_SESSION['online']));

                if($check->rowCount() == 1) {
                    $sql = MySql::conectar()->prepare("UPDATE `tb_adm.usuarios_online` SET ultima_acao = ? WHERE token = ?");
                    $sql->execute(array($horarioAtual,$token));
                }else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $token = $_SESSION['online'];
                    $horarioAtual = date('Y-m-d H:i:s');
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.usuarios_online` VALUES (null,?,?,?)");
                    $sql->execute(array($ip,$horarioAtual,$token));
                }
            }else {
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.usuarios_online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }
        }//Fim da Função updateUserOnline

        
        //Listar o total de visitas no site
        public static function selectUsersTotal() {
			$listarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios_visitas`");
            $listarVisitasTotais->execute();
            $listarVisitasTotais = $listarVisitasTotais->rowCount();
			return $listarVisitasTotais;
        }// Fim da Função selectUsersTotal
        

        //Listar o total de visitas no dia atual
        public static function selectUsersToday() {     
			$listarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios_visitas` WHERE dia = ?");
            $listarVisitasHoje->execute(array(date('Y-m-d')));
            $listarVisitasHoje = $listarVisitasHoje->rowCount();
			return $listarVisitasHoje;
        }// Fim da Função selectUsersToday


        //Contar as visitas a partir do cookie
        public static function countUsers() {
            //setcookie('visita','true',time() -1); //para destruir o cookie existente
            if(!isset($_COOKIE['visita'])) {
                setcookie('visita','true',time() + (60*60*24*7)); //time() + (segundos*minutos*horas*dias))
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.usuarios_visitas` VALUES (null,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
            }
        }//Fim da Função countUsers


        //Atualizar dados editados do usuário
        public function updateUser($nome,$sobrenome,$senha,$avatar) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_adm.usuarios` SET nome = ?,sobrenome = ?,senha = ?,avatar = ? WHERE usuario = ? AND CIN = ?");
            if($sql->execute(array($nome,$sobrenome,$senha,$avatar,$_SESSION['usuario'],$_SESSION['CIN']))){
                return true;
            }else{
                return false;
            }
        }//Fim da Função updateUser


        //Atualizar os dados alterados do usuário logado
        public static function redirectUser() {
            session_destroy();
            echo "<script>window.close();</script>";
            echo "<script>location.href='entrar';</script>";
        }// Fim da Função redirectUser


        //Verificar se o campo usuário ja existe na tabela usuários
        public static function existsUser($usuario) {
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_adm.usuarios` WHERE usuario = ? AND CIN = ?");
            $sql->execute(array($usuario,$_SESSION['CIN']));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }//Fim da Função existsUser


        //Verificar se o campo email já existe na tabela usuários
        public static function existsEmail($email) {
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_adm.usuarios` WHERE email = ? AND CIN = ?");
            $sql->execute(array($email,$_SESSION['CIN']));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }//Fim da Função existsEmail


        //Cadastrar novo usuário no painel
        public static function insertUser(
                $CIN,$usuario,$nome,$sobrenome,$email,
                $senha,$avatar,$tipousuario,$dataregistro,$site,
                $dashboard,$simulador,$financeiro,$vendas,$catalogos,
                $operacional,$relatorios) {
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_adm.usuarios` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->execute(array(
                $CIN,$usuario,$nome,$sobrenome,$email,
                $senha,$avatar,$tipousuario,$dataregistro,$site,
                $dashboard,$simulador,$financeiro,$vendas,$catalogos,
                $operacional,$relatorios));
        }//Fim da Função insertUser


        //Lembrar os dados de acesso no painel a partir da opção no painel de login
        //Para funcionar, precisa limpar os cookies de acesso
        public static function rememberAccess($usuario,$senha) {
            if(isset($_COOKIE['lembrar'])){
                $CIN = $_POST['CIN'];
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE usuario = ? AND senha = ? AND CIN = ?");
                $sql->execute(array($usuario,$senha,$_SESSION['CIN']));
                if($sql->rowCount() == 1) {
                        $info = $sql->fetch();
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
                        PHP::redirect(INCLUDE_PATH_PAINEL);
                }
            }
        }//Fim da Função rememberAccess


        
    }//Fim da Class Usuario

?>