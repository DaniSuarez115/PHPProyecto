<?php

class Main extends Controller
{
    function __construct(){
        parent::__construct();
        parent::connectionSession();
    }

    function render(){   
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }
        $this->view->render('main/index');
    }
}


?>