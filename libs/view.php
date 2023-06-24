<?php
//clase que permite el
// redireccionamiento entre las vistas
class view {

    function __construct()
    {
        
    }

    function render($nombre){
        require 'view/'.$nombre.'.php';
    }
}


?>