<?php

include_once 'class/grupos.php';


class GruposModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getGrupos(){
        $items = [];

        try {
            //code...
            $stringSQL = "SELECT * FROM `grupo` order by id DESC;";
            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classGrupos();

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

//     public function insertarCurso($datos){
// //# INSERT INTO curso(id, nombre, descripcion, tiempo, usuario) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
//         try {
//             //code...
//             $datos['id'] = "0";
//             $datos['usuario'] = "Prof Mario";
//             $stringSQL = 'INSERT INTO curso(id, nombre, descripcion, tiempo, usuario) VALUES ( :id, :nombre, :descripcion, :tiempo, :usuario);';
//             $query = $this->db->connect()->prepare($stringSQL);
//             $query->execute($datos);
//             return true;

//         } catch (PDOException $th) {
//             //throw $th;
//             //var_dump($th);
//             return false;
//         }
//     }
}

?>