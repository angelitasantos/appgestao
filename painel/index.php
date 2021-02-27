<?php
    ob_start();
    include('../config.php');

    if(Painel::login() == false){
        include('entrar.php');
    }else if($_SESSION['site'] == '1'){
        include('main.php');
    }else{
        include('main.php');
    }
    ob_end_flush();

?>