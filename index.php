<?php

	include('config.php');
	Usuario::updateUserOnline();
	Usuario::countUsers();

	$homeController = new controller\homeController();
	$registrarController = new controller\registrarController();
	$agendaController = new controller\agendaController();
	$blogController = new controller\blogController();
	$downloadController = new controller\downloadController();
	$podcastController = new controller\podcastController();
	$clienteController = new controller\clienteController();

	Router::get('/',function() use ($homeController) {
		$homeController->index();
	});

	Router::get('/registrar',function() use ($registrarController) {
		$registrarController->index();
	});

	Router::post('/registrar',function() use ($registrarController) {
		$registrarController->index();
	});

	Router::get('/agenda',function() use ($agendaController) {
		$agendaController->index();
	});

	Router::get('/blog',function() use ($blogController) {
		$blogController->index();
	});

	Router::get('/downloads',function() use ($downloadController) {
		$downloadController->index();
	});

	Router::get('/podcasts',function() use ($podcastController) {
		$podcastController->index();
	});

	Router::get('/clientes',function() use ($clienteController) {
		$clienteController->index();
	});

	
?>