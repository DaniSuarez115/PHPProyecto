<?php
 class Usuarios extends Controller
 {
    function __construct(){
        parent:: __construct();
        parent::connectionSession();
        $this->view->datos = [];
        $this->view->mensaje = "Seccion Usuarios";
        $this->view->mensajeResultado = "";    
    }
    function render(){
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }
        $datos = $this->model->getUsuarios();               
        $this->view->datos = $datos;
        $this->view->render('usuarios/index');
    }
    function crear(){   //para ver la vista     
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }              
        $this->view->datos = [];
        $this->view->mensaje = "Crear Usuario";
        $this->view->render('usuarios/crear');
    }
    function insertarUsuario(){
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }

        if ($this->model->insertarUsuario($_POST)){
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Nuevo Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }
    function detalle(){               
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }       
        $this->view->datos = [];
        $this->view->mensaje = "Detalles del Usuario";
        $this->view->render('usuarios/detalle');
    }
    function verUsuarios( $param = null ){       
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        } 
        $id = $param[0];

        $datos = $this->model->verUsuarios($id);        
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle usuario";
        $this->view->render('usuarios/detalle');
    }

    function actualizarusuario(){

        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }
        
        if ($this->model->actualizarusuario($_POST)){

            $datos = new classUsuarios();

            foreach ($_POST as $key => $value) {
                # code...
                $datos->$key= $value;
            }

            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Actualizacion de Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se actualizo el Registro
                </div>';
        }
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle usuario";
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->view->render('usuarios/detalle');
    }    


    function eliminarUsuario( $param = null ){   
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }
        $id = $param[0];
        if ($this->model->eliminarusuario($id)){
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Se elimino el Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se elimino el Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }    


     function login()
    {
    // Obtener los datos del formulario de inicio de sesión
    $usuario = $_POST['user'];
    $password = $_POST['password'];

    // Verificar si los datos de inicio de sesión son válidos
    if ($this->model->validarUsuario($usuario, $password)) {
        // Iniciar sesión para el usuario
        session_start();
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = $usuario;

        // Redirigir al usuario a la página principal
        header('Location: ' . constant('URL'));
    } else {
        // Mostrar mensaje de error y volver a cargar el formulario de inicio de sesión
        $this->view->mensaje = "Credenciales inválidas";
        $this->view->render('auth/login');
    }
    }

    function logout() {
        // Cerrar la sesión del usuario
        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        header('Location: ' . constant('URL') . 'usuarios/loginForm');
        exit;
    }

    public function loginForm()
    {
        // Aquí deberías cargar la vista del formulario de inicio de sesión
        $this->view->render('auth/login');
    }

 }


?>