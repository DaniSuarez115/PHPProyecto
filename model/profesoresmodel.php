<?php
include_once 'class/profesores.php';

class ProfesoresModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getProfesores() {
        $items = [];

        try {
            $stringSQL = "SELECT * FROM `profesor` ORDER BY id DESC";
            $query = $this->db->connect()->query($stringSQL);

            while ($row = $query->fetch()) {
                $item = new classProfesores();

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

    public function insertarProfesores($datos) {
        try {
            $datos['id'] = "0";
            $stringSQL = 'INSERT INTO profesor (id, cedula, correoelectronico, telefono, telefonocelular, fechanacimiento, sexo, direccion, nombre, apellidopaterno, apellidomaterno, nacionalidad, idCarreras, usuario) VALUES (:id, :cedula, :correoelectronico, :telefono, :telefonocelular, :fechanacimiento, :sexo, :direccion, :nombre, :apellidopaterno, :apellidomaterno, :nacionalidad, :idCarreras, :usuario)';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function verProfesores($id) {
        try {
            $item = new classProfesores();

            $stringSQL = "SELECT * FROM `profesor` WHERE id = :id";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                foreach ($row as $key => $value) {
                    $item->$key = $value;
                }
            }

            return $item;
        } catch (PDOException $th) {
            return [];
        }
    }

    public function actualizarProfesores($datos) {
        try {
            $stringSQL = 'UPDATE profesor SET cedula = :cedula, correoelectronico = :correoelectronico, telefono = :telefono, telefonocelular = :telefonocelular, fechanacimiento = :fechanacimiento, sexo = :sexo, direccion = :direccion, nombre = :nombre, apellidopaterno = :apellidopaterno, apellidomaterno = :apellidomaterno, nacionalidad = :nacionalidad, idCarreras = :idCarreras, usuario = :usuario WHERE id = :id';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);

            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function eliminarProfesores($id) {
        try {
            $stringSQL = "DELETE FROM `profesor` WHERE id = :id";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
?>
