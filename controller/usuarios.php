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

    function actualizarusuario()
    {
        if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
            header('Location: ' . constant('URL') . 'usuarios/loginForm');
            exit;
        }
        
        // Obtener los datos enviados por el formulario
        $id = $_POST['id'];
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Verificar si la contraseña actual es válida
        if (!$this->model->validarContrasenaActual($id, $password)) {
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    La contraseña actual no es válida
                </div>';
    
            $this->view->mensajeResultado = $mensajeResultado;
            $this->render();
            return;
        }
    
        // Actualizar los datos del usuario en el modelo
        $datos = array(
            'id' => $id,
            'name' => $nombre,
            'email' => $email,
            'password' => $password
        );
    
        if ($this->model->actualizarusuario($datos)) {
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Actualización de Registro
                </div>';
        } else {
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se actualizó el Registro
                </div>';
        }
    
        $this->view->mensajeResultado = $mensajeResultado;
        $this->render();
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