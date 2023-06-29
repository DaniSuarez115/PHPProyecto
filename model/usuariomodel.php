<?php
include_once 'class/usuario.php';


class UsuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getUsuario(){        
        $items = [];

        try {
            
            $stringSQL = "SELECT * FROM `usuarios` order by id DESC;";
            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classUsuario();

                foreach ($row as $key => $value) {
                  
                    $item->$key = $value;
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
         
            return [];
        }
    }

    public function insertarUsuario($datos){
//# INSERT INTO curso(id, nombre, descripcion, tiempo, usuario) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        try {
            //code...
            $datos['id'] = "0";
            // $datos['usuario'] = "Prof Mario";
            $stringSQL = 'INSERT INTO usuarios(id, name, password, email) VALUES ( :id, :name, :password, :email);';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;

        } catch (PDOException $th) {
            //throw $th;
            //var_dump($th);
            return false;
        }
    }

    public function verUsuarios($id){
        // var_dump($_SESSION);
        try {
            $item = new classUsuario();
            //code...
            $stringSQL = "Select * FROM `usuarios` where id=:id;";
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
      public function actualizarUsuario($datos){
//            var_dump($datos);
        try {
            //code... 
            //#UPDATE curso SET nombre='[value-2]',descripcion='[value-3]',tiempo='[value-4]',usuario='[value-5]' WHERE id='[value-1]'                     
            // $datos['usuario'] = "Prof Mario";
            $stringSQL = 'UPDATE usuarios SET name=:name,password=:password,email=:email WHERE id=:id ;';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;

        } catch (PDOException $th) {
            //throw $th;
            // var_dump($th);
            return false;
        }
    }   

    //eliminarcurso
    public function eliminarUsuario($id){        
        try {            
            //code...
            $stringSQL = "DELETE FROM `usuarios` WHERE id =:id;";
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