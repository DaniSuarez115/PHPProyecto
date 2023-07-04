<?php 
    // ini_set('display_erros', 1);
    // ini_set('display_startup_erros', 1);
    // error_reporting(E_ALL);

    require_once 'libs/database.php';
    require_once 'libs/session.php';
    require_once 'libs/controller.php';
    require_once 'libs/model.php';
    require_once 'libs/view.php';
    require_once 'libs/app.php';
    session_start();
    require_once 'config/config.php';
    $app = new App();

?>