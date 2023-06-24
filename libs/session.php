<?php

class Session{
    function __construct(){

    }
    function connectionSession(){
        if(!isset($_SESSION)){
            session_start();
        }

        // if(isset($_SESSION['idUser'])){
        //     //---->hacia el dashboard o el main
        // }
        // else{
        //     echo 'Desconectado';

        //     echo "<script>
        //             alert('Redireccionando, no esta autenticado');
        //             window.location='login';
        //         </script>";
        // }
    }
//{"id":"101","name":"s","email":"ss@hsb","password":"1c592e3481c4df3b64a4dd38fae38280"},{"id":"100","name":"Mar\u00eda Daniela ","email":"danibch1828@gmail.com","password":"1c592e3481c4df3b64a4dd38fae38280"},
}



?>