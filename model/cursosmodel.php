<?php

include_once 'class/cursos.php';


class CursosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getCursos(){        
        $items = [];

        try {
            //code...
            $stringSQL = "SELECT * FROM `curso` order by id DESC;";
            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classCursos();

                foreach ($row as $key => $value) {
                    # code...
                    $item->$key = $value;
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            //throw $th;
            return [];
        }
    }

    public function insertarCurso($datos){
//# INSERT INTO curso(id, nombre, descripcion, tiempo, usuario) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        try {
            //code...
            $datos['id'] = "0";
            $datos['usuario'] = "Prof Mario";
            $stringSQL = 'INSERT INTO curso(id, nombre, descripcion, tiempo, usuario) VALUES ( :id, :nombre, :descripcion, :tiempo, :usuario);';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;

        } catch (PDOException $th) {
            //throw $th;
            //var_dump($th);
            return false;
        }
    }

    public function verCursos($id){
        var_dump($_SESSION);
        try {
            $item = new classCursos();
            //code...
            $stringSQL = "Select * FROM `curso` where id=:id;";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id'=>$id]);

            while ( $row = $query->fetch()){//obtiene la fila
                foreach ($row as $key => $value) {
                    # code...
                    $item->$key = $value;
                   // $_SESSION['autenticado'] = true;
                }
            }
            return $item;
        } catch (PDOException $th) {
            //throw $th;
            return [];
        }           
    }
      //actualizarcurso
      public function actualizarcurso($datos){
//            var_dump($datos);
        try {
            //code... 
            //#UPDATE curso SET nombre='[value-2]',descripcion='[value-3]',tiempo='[value-4]',usuario='[value-5]' WHERE id='[value-1]'                     
            $datos['usuario'] = "Prof Mario";
            $stringSQL = 'UPDATE curso SET nombre=:nombre,descripcion=:descripcion,tiempo=:tiempo,usuario=:usuario WHERE id=:id ;';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;

        } catch (PDOException $th) {
            //throw $th;
            var_dump($th);
            return false;
        }
    }   

    //eliminarcurso
    public function eliminarcurso($id){        
        try {            
            //code...
            $stringSQL = "DELETE FROM `curso` WHERE id =:id;";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id'=>$id]);
            
            return true;
        } catch (PDOException $th) {
            //throw $th;
            var_dump($th);
            return false;
        }           
    }
}

?>