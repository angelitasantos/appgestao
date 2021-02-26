<?php

    class Site {

		//Lista de opções categorias para as seções do site: blog, downloads, podcasts
        public static $categoriasSite = [
            '0' => 'Todas',
            '1' => 'Financeiro',
            '2' => 'Vendas',
            '3' => 'Estoque',
            '4' => 'Compras',
            '5' => 'Produção',
            '6' => 'Administrativo',
            '7' => 'Simulador'
        ];// Fim da lista de opções: categoriasSite


		//Lista de opções campo: tipousuario
		public static $tipoAcesso = [
            '0' => 'OPERACIONAL',
            '1' => 'SUPERVISOR',
            '2' => 'ADMINISTRADOR',
            '3' => 'MASTER'
        ];// Fim da lista de opções: tipoAcesso


		//Lista de opções campo: sim ou não
		public static $tipoPermissao = [
            '0' => 'NÃO',
            '1' => 'SIM'
        ];// Fim da lista de opções: tipoPermissao


        //Lista de opções campo: tipoitem
        public static $tipoItem = [
            '0' => 'AMBOS',
            '1' => 'PRODUTO',
            '2' => 'SERVICO'
        ];// Fim da lista de opções: tipoitem


        //Lista de opções campo: ramoatividade
		public static $tipoAtividade = [
            '0' => 'Escolha uma opção',
            '1' => 'Indústria',
            '2' => 'Comércio',
            '3' => 'Serviço',
            '4' => 'Filantropia'
        ];// Fim da lista de opções: tipoAtividade


		//Lista de opções campo: UF (estados brasileiros)
		public static $estados = [
            '0' => 'UF',
            '1' => 'AC',
            '2' => 'AL',
            '3' => 'AM',
            '4' => 'AP',
            '5' => 'BA',
            '6' => 'CE',
            '7' => 'DF',
            '8' => 'ES',
            '9' => 'GO',
            '10' => 'MA',
            '11' => 'MT',
            '12' => 'MS',
            '13' => 'MG',
            '14' => 'PA',
            '15' => 'PB',
            '16' => 'PR',
            '17' => 'PE',
            '18' => 'PI',
            '19' => 'RJ',
            '20' => 'RN',
            '21' => 'RS',
            '22' => 'RO',
            '23' => 'RR',
            '24' => 'SC',
            '25' => 'SP',
            '26' => 'SE',
            '27' => 'TO'
		];// Fim da lista de opções: estados

		

    }//Fim da Class Site

?>