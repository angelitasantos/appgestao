<?php

    class PHP {
        
		//Função criada por Guilherme Grillo (DankiCode)
		//Utilizada para o campo Slug (quando redirecionar uma página a partir de um texto)
        public static function generateSlug($string) {
			$string = mb_strtolower($string);
			$string = preg_replace('/(â|á|ã)/', 'a', $string);
			$string = preg_replace('/(ê|é)/', 'e', $string);
			$string = preg_replace('/(í|Í)/', 'i', $string);
			$string = preg_replace('/(ú)/', 'u', $string);
			$string = preg_replace('/(ó|ô|õ|Ô)/', 'o',$string);
			$string = preg_replace('/(_|\/|!|\?|#)/', '',$string);
			$string = preg_replace('/( )/', '-',$string);
			$string = preg_replace('/ç/','c',$string);
			$string = preg_replace('/(-[-]{1,})/','-',$string);
			$string = preg_replace('/(,)/','-',$string);
			$string=strtolower($string);
			return $string;
        }// Fim da Função generateSlug
		

		//Inserir registro
        public static function insertOne($array) {
			$certo = true;
			$nome_tabela = $array['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES (null";
			foreach ($array as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela')
					continue;
				if($value == '') {
					$certo = false;
					break;
				}
				$query.=",?";
				$parametros[] = $value;
			}

			$query.=")";
			if($certo == true) {
				$sql = MySql::conectar()->prepare($query);
				$sql->execute($parametros);
			}
			return $certo;
        }//Fim da Função insertOne
		

		//Lista todos os registros com filtro CIN
        public static function selectAllCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY id ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY id ASC LIMIT $start,$end");
            $sql->execute(array($_SESSION['CIN']));
			return $sql->fetchAll();
		}//Fim da Função selectAllCIN


		//Lista todos os registros com filtro CIN por descricao
        public static function selectAllDescCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY descricao ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY descricao ASC LIMIT $start,$end");
            $sql->execute(array($_SESSION['CIN']));
			return $sql->fetchAll();
		}//Fim da Função selectAllDescCIN


		//Lista todos os registros com filtro CIN por titulo
        public static function selectAllTitleCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY titulo ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? ORDER BY titulo ASC LIMIT $start,$end");
            $sql->execute(array($_SESSION['CIN']));
			return $sql->fetchAll();
		}//Fim da Função selectAllTitleCIN


		//Lista todos os registros sem filtro CIN
		public static function selectAll($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` ORDER BY CIN ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` ORDER BY CIN ASC LIMIT $start,$end");
            
            $sql->execute();
			
			return $sql->fetchAll();

        }//Fim da Função selectAll


		//Lista apenas o registro selecionado com filtro CIN
		public static function selectOneCIN($table,$query = '',$arr = '') {
			if($query != false) {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ? AND $query");
				$sql->execute($arr);
			}else {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = ?");
				$sql->execute(array($_SESSION['CIN']));
			}
			return $sql->fetch();
		}//Fim da Função selectOneCIN


        //Lista apenas o registro selecionado sem filtro CIN
		public static function selectOne($table,$query = '',$arr = '') {
			if($query != false) {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else {
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetch();
		}//Fim da Função selectOne
		

		//Editar registro selecionado
        public static function updateOne($array,$single = false) {
			$certo = true;
			$first = false;
			$nome_tabela = $array['nome_tabela'];

			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($array as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == '') {
					$certo = false;
					break;
				}
				
				if($first == false) {
					$first = true;
					$query.="$nome=?";
				}
				else {
					$query.=",$nome=?";
				}

				$parametros[] = $value;
			}

			if($certo == true) {
				if($single == false) {
					$parametros[] = $array['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE id=?');
					$sql->execute($parametros);
				}else {
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}//Fim da Função updateOne


		//Deletar o registro selecionado
        public static function deleteOne($table,$id=false) {
			if($id == false) {
				$sql = MySql::conectar()->prepare("DELETE FROM `$table`");
			}else {
				$sql = MySql::conectar()->prepare("DELETE FROM `$table` WHERE id = $id");				
			}
			$sql->execute();
		}//Fim da Função deleteOne


		//Redirecionar para outra URL
		public static function redirect($url) {
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}//Fim da Função redirect


		//Lista todos os registros com filtro CIN
        public static function selectSiteAllCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY id ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY id ASC LIMIT $start,$end");
            $sql->execute(array('19781221'));
			return $sql->fetchAll();
		}//Fim da Função selectAllCIN


		//Lista todos os registros com filtro CIN por titulo
        public static function selectSiteAllTitleCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY titulo ASC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY titulo ASC LIMIT $start,$end");
            $sql->execute(array('19781221'));
			return $sql->fetchAll();
		}//Fim da Função selectAllTitleCIN


		//Lista todos os registros com filtro CIN por data
        public static function selectSiteAllDateCIN($table,$start = null,$end = null) {
			if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY datapublicacao DESC");
            else
				$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE CIN = '19781221' ORDER BY datapublicacao DESC LIMIT $start,$end");
            $sql->execute(array('19781221'));
			return $sql->fetchAll();
		}//Fim da Função selectSiteAllDateCIN


		
    }//Fim da Class PHP

?>