<?php

  session_start();
  date_default_timezone_set('America/Sao_Paulo');
    
  //Funções das classes
  $autoload = function($class) {
    if($class == 'MySql') {
		  include('classes/MySql.php');
	}
    include('classes/'.$class.'.php');
  };

  spl_autoload_register($autoload);

  // Definir os caminhos para o site / painel
    define('INCLUDE_PATH','http://localhost/appgestao/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

  define('BASE_DIR_PAINEL',__DIR__.'/painel');

  //Conectar com banco de dados!
    define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
    define('DATABASE','projetophp');

  //Definir constantes do Painel de Controle
  define('NOME_NEGOCIO','SanLis Gestão');
  
  //Funções
  function selecionarTipoUsuario($tipousuario) {
    return Site::$tipoAcesso[$tipousuario];
  }

  function selecionarTipoPermissao($simulador) {
    return Site::$tipoPermissao[$simulador];
  }

  function selecionaCategorias($categoria) {
    return Site::$categoriasSite[$categoria];
  }

  function selecionaTipoItem($tipoitem) {
    return Site::$tipoItem[$tipoitem];
  }

  //Recuperar informação incluída após mensagem de erro
  function recoverPost($post) {
    if(isset($_POST[$post])) {
      echo $_POST[$post];
    }
  }

  
  //Permissões Menu Operacional
  function verificaPermissaoMenu($permissao) {
    if($_SESSION['tipousuario'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }
    
  function verificaPermissaoPagina($permissao) {
    if($_SESSION['tipousuario'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Menu Configurações Site
  function verificaPermissaoSite($permissao) {
    if($_SESSION['site'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }
    
  function verificaPermissaoPaginaSite($permissao) {
    if($_SESSION['site'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Dashboard
  function permissaoDashboardMenu($permissao) {
    if($_SESSION['dashboard'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoDashboardPagina($permissao) {
    if($_SESSION['dashboard'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Simulador
  function permissaoSimuladorMenu($permissao) {
    if($_SESSION['simulador'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoSimuladorPagina($permissao) {
    if($_SESSION['simulador'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Financeiro
  function permissaoFinanceiroMenu($permissao) {
    if($_SESSION['financeiro'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoFinanceiroPagina($permissao) {
    if($_SESSION['financeiro'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Vendas
  function permissaoVendasMenu($permissao) {
    if($_SESSION['vendas'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoVendasPagina($permissao) {
    if($_SESSION['vendas'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Catalogos
  function permissaoCatalogosMenu($permissao) {
    if($_SESSION['catalogos'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoCatalogosPagina($permissao) {
    if($_SESSION['catalogos'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Operacional
  function permissaoOperacionalMenu($permissao) {
    if($_SESSION['operacional'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoOperacionalPagina($permissao) {
    if($_SESSION['operacional'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Relatorios
  function permissaoRelatoriosMenu($permissao) {
    if($_SESSION['relatorios'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoRelatoriosPagina($permissao) {
    if($_SESSION['relatorios'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Estoque
  function permissaoEstoqueMenu($permissao) {
    if($_SESSION['estoque'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoEstoquePagina($permissao) {
    if($_SESSION['estoque'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Compras
  function permissaoComprasMenu($permissao) {
    if($_SESSION['compras'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoComprasPagina($permissao) {
    if($_SESSION['compras'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }


  //Permissões Páginas Produção
  function permissaoProducaoMenu($permissao) {
    if($_SESSION['producao'] >= $permissao) {
      return;
    }else {
      echo 'style="display:none;"';
    }
  }

  function permissaoProducaoPagina($permissao) {
    if($_SESSION['producao'] >= $permissao) {
      return;
    }else {
      include('painel/pages/permissao_negada.php');
      die();
    }
  }

?>