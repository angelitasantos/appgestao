<?php

    namespace controller;

    class agendaController {

        public function index() {
            \views\agendaView::render('agenda.php');
        }

    }

?>