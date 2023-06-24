<?php
class Grupos extends Controller{
    function __construct(){
        parent::__construct();
        parent::connectionSession();

        $this->view->datos = [];
        $this->view->mensaje = "Seccion Grupos";
        $this->view->mensajeResultado = "";        
    }
    function render(){
        $datos = $this->model->getGrupos();               
        $this->view->datos = $datos;
        $this->view->render('grupos/index');
    }

    function crear(){   //para ver la vista                   
        $this->view->datos = [];
        $this->view->mensaje = "Crear Grupos";
        $this->view->render('grupos/crear');
    }

    // function insertarCurso(){
    //     //var_dump($_POST);
    //     if ($this->model->insertarCurso($_POST)){
    //         $mensajeResultado = '
    //             <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 Nuevo Registro
    //             </div>';
    //     }else{
    //         $mensajeResultado = '
    //             <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 No se Registro
    //             </div>';
    //     }
    //     $this->view->mensajeResultado = $mensajeResultado;        
    //     $this->render();
    // }

    // function detalle(){                      
    //     $this->view->datos = [];
    //     $this->view->mensaje = "Detalles del Cursos";
    //     $this->view->render('cursos/detalle');
    // }

}

?>