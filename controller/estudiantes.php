<?php
class Estudiantes extends Controller {
    function __construct() {
        parent::__construct();
        parent::connectionSession();
        $this->view->datos = [];
        $this->view->mensaje = "Seccion Estudiantes";
        $this->view->mensajeResultado = "";
    }

    function render() {
        $datos = $this->model->getEstudiantes();
        $this->view->datos = $datos;
        $this->view->render('estudiante/index');
    }

    function crear() {
        $this->view->datos = [];
        $this->view->mensaje = "Crear Estudiante";
        $this->view->render('estudiante/crear');
    }

    function insertarEstudiantes() {
        if ($this->model->insertarEstudiantes($_POST)) {
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Nuevo Registro
                </div>';
        } else {
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se Registró
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;
        $this->render();
    }

    function detalle() {
        $this->view->datos = [];
        $this->view->mensaje = "Detalles del Estudiante";
        $this->view->render('estudiante/detalle');
    }

    function verEstudiante($param = null) {
        $id = $param[0];

        $datos = $this->model->verEstudiantes($id);
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle estudiante";
        $this->view->render('estudiante/detalle');
    }

    function actualizarEstudiantes() {
        if ($this->model->actualizarEstudiantes($_POST)) {
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

    function eliminarEstudiantes($param = null) {
        $id = $param[0];
        if ($this->model->eliminarEstudiantes($id)) {
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Se eliminó el Registro
                </div>';
        } else {
            $mensajeResultado = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se eliminó el Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;
        $this->render();
    }
}
?>
