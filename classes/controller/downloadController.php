<?php

    namespace controller;

    class downloadController {

        public function index() {
            \views\downloadView::render('downloads.php');
        }

    }

?>