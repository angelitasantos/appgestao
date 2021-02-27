<?php

    namespace views;

    class podcastView {

        public static $params = [];

        public static function setParams($params) {
            self::$params = $params;
        }

        public static function render($fileName,$header = 'pages/includes/header.php',$footer = 'pages/includes/footer.php') {
            include($header);
            include('pages/'.$fileName);
            include($footer);
            die();
            
        }

    }

?>