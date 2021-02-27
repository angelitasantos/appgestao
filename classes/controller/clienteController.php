<?php

    namespace controller;

    class clienteController {

        public function index() {
            \views\clienteView::render('clientes.php');
        }

    }

?>