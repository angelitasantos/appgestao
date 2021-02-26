<?php

	class MySql {

		private static $pdo;

		//Conectar no banco de dados
		public static function conectar() {
			if(self::$pdo == null) {
				try {
				self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e) {
					echo '<h3 class="erro-box">Falha ao conectar o Banco de Dados</h3>';
				}
			}
			return self::$pdo;
		}//Fim da Função conectar
		
	}//Fim da Class MySql
	
?>