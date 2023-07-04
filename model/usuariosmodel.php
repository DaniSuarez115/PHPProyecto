<?php
include_once 'class/usuarios.php';


class UsuariosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getUsuarios(){        
        $items = [];

        try {
            
            $stringSQL = "SELECT * FROM `user` order by id DESC;";
            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classUsuarios();

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
        try {
            $datos['id'] = "0";
            $datos['password'] = password_hash($datos['password'], PASSWORD_DEFAULT);
    
            $stringSQL = 'INSERT INTO user(id, name, password, email) VALUES (:id, :name, :password, :email);';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function verUsuarios($id){
        // var_dump($_SESSION);
        try {
            $item = new classUsuarios();
            //code...
            $stringSQL = "Select * FROM `user` where id=:id;";
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

    function actualizarusuario($datos)
    {
        try {
            // Verificar si se debe actualizar la contraseña
            if (isset($datos['password'])) {
                // Encriptar la nueva contraseña antes de actualizarla
                $hashedPassword = password_hash($datos['password'], PASSWORD_DEFAULT);
                $datos['password'] = $hashedPassword;
            }

            $stringSQL = 'UPDATE user SET name=:name, password=:password, email=:email WHERE id=:id;';
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
    public function eliminarusuario($id){        
        try {            
            //code...
            $stringSQL = "DELETE FROM `user` WHERE id =:id;";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id'=>$id]);
            
            return true;
        } catch (PDOException $th) {
            //throw $th;
            var_dump($th);
            return false;
        }           
    }

    public function validarUsuario($usuario, $password)
    {
        try {
            $stringSQL = "SELECT * FROM `user` WHERE name = :usuario;";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['usuario' => $usuario]);

            $row = $query->fetch();

            if ($row) {
                $hashedPassword = $row['password'];
                return password_verify($password, $hashedPassword);
            }

            return false;
        } catch (PDOException $th) {
            return false;
        }
    }
}
?>