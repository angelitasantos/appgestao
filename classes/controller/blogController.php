<?php

    namespace controller;

    class blogController {

        public function index() {
            \views\blogView::render('blog.php');
        }

    }

?>