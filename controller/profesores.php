<?php
class Profesores extends Controller {
    function __construct() {
        parent::__construct();
        parent::connectionSession();
        $this->view->datos = [];
        $this->view->mensaje = "Sección Profesores";
        $this->view->mensajeResultado = "";
    }

    function render() {
        $datos = $this->model->getProfesores();
        $this->view->datos = $datos;
        $this->view->render('profesores/index');
    }

    function crear() {
        $this->view->datos = [];
        $this->view->mensaje = "Crear profesores";
        $this->view->render('profesores/crear');
    }

    function insertarProfesores() {
        if ($this->model->insertarProfesores($_POST)) {
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
        $this->view->mensaje = "Detalles del profesor";
        $this->view->render('profesores/detalle');
    }

    function verProfesores($param = null) {
        $id = $param[0];

        $datos = $this->model->verProfesores($id);
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle del profesor";
        $this->view->render('profesores/detalle');
    }

    function actualizarProfesores() {
        if ($this->model->actualizarProfesores($_POST)) {
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

    function eliminarProfesores($param = null) {
        $id = $param[0];
        if ($this->model->eliminarProfesores($id)) {
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
