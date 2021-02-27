<?php

    class Painel {


        //Entrar no painel
        public static function login() {
            return isset($_SESSION['entrar']) ? true : false;
        }// Fim da Função login


        //Sair do painel
        public static function loggout() {
            setcookie('lembrar','true',time()-1,'/');
            session_destroy();
            echo "<script>location.href='';</script>";
        }// Fim da Função loggout


        //Carregar a página para os usuários (home.php)
        public static function loadPage() {
            if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}
				else if(file_exists('pages/noticias/'.$url[0].'.php')){
					include('pages/noticias/'.$url[0].'.php');
				}
				else if(file_exists('pages/site/'.$url[0].'.php')){
					include('pages/site/'.$url[0].'.php');
				}
				else if(file_exists('erp/'.$url[0].'.php')){
					include('erp/'.$url[0].'.php');
				}
				else if(file_exists('erp/compras/'.$url[0].'.php')){
					include('erp/compras/'.$url[0].'.php');
				}
				else if(file_exists('erp/estoque/'.$url[0].'.php')){
					include('erp/estoque/'.$url[0].'.php');
				}
				else if(file_exists('erp/financeiro/'.$url[0].'.php')){
					include('erp/financeiro/'.$url[0].'.php');
				}
				else if(file_exists('erp/producao/'.$url[0].'.php')){
					include('erp/producao/'.$url[0].'.php');
				}
				else if(file_exists('erp/vendas/'.$url[0].'.php')){
					include('erp/vendas/'.$url[0].'.php');
				}
				else if(file_exists('erp/relatorios/'.$url[0].'.php')){
					include('erp/relatorios/'.$url[0].'.php');
				}
				else if(file_exists('erp/simulador/'.$url[0].'.php')){
					include('erp/simulador/'.$url[0].'.php');
				}
				else{
					//Sistema de rotas!
					if(Router::get('visualizar-empreendimento/?',function($par){
						include('views/visualizar-empreendimento.php');
					})){

					}else if(Router::post('visualizar-empreendimento/?',function($par){
						include('views/visualizar-empreendimento.php');
					})){
					}else{
						header('Location: '.INCLUDE_PATH_PAINEL);
					}
					
				}
			}else{
                include('pages/home.php');
            }
        }// Fim da Função loadPage


        //Alerta informando sucesso ou erro ao executar uma ação
        public static function alert($tipo,$mensagem) {
			if($tipo == 'sucesso') {
				echo '<div class="sucesso-box"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro') {
				echo '<div class="erro-box"><i class="fa fa-times"></i> '.$mensagem.'</div>';
			}
        }// Fim da Função alert
        

        //Validar formatos e tamanho da imagem a ser inserida no painel
        public static function validImage($avatar) {
			if($avatar['type'] == 'image/jpeg' ||
				$avatar['type'] == 'imagem/jpg' ||
				$avatar['type'] == 'imagem/png'){

				$tamanho = intval($avatar['size']/1024);
				if($tamanho < 300)
					return true;
				else
					return false;
			}else {
				return false;
			}
		}// Fim da Função validImage


        //Salva o arquivo na pasta uploads
        public static function uploadFile($file) {
            //Altera o nome original do arquivo para não apagar arquivo existente com o mesmo nome.
			$formatoArquivo = explode('.',$file['name']);
			$arquivoNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$arquivoNome))
				return $arquivoNome;
			else
				return false;
		}// Fim da Função uploadFile


        //Deleta o arquivo atual para adicionar um novo arquivo
		public static function deleteFile($file) {
			@unlink('uploads/'.$file);
        }// Fim da Função deleteFile



    }// Fim da Class Painel

?>