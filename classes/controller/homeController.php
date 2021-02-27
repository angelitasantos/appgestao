<?php

    namespace controller;

    class homeController {

        public function index() {
            \views\mainView::render('home.php');
        }

    }

?>