<?php

    namespace controller;

    class podcastController {

        public function index() {
            \views\podcastView::render('podcasts.php');
        }

    }

?>