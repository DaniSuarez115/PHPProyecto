<?php
include_once 'class/estudiantes.php';

class EstudiantesModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getEstudiantes() {
        $items = [];

        try {
            $stringSQL = "SELECT * FROM `estudiante` ORDER BY id DESC";
            $query = $this->db->connect()->query($stringSQL);

            while ($row = $query->fetch()) {
                $item = new classEstudiantes();

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

    public function insertarEstudiantes($datos) {
        try {
            $datos['id'] = "0";
            $datos['usuario'] = "Prof Mario";

            $stringSQL = 'INSERT INTO estudiante (id, cedula, correoelectronico, telefono, telefonocelular, fechanacimiento, sexo, direccion, nombre, apellidopaterno, apellidomaterno, nacionalidad, idCarreras, usuario) VALUES (:id, :cedula, :correoelectronico, :telefono, :telefonocelular, :fechanacimiento, :sexo, :direccion, :nombre, :apellidopaterno, :apellidomaterno, :nacionalidad, :idCarreras, :usuario)';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);

            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function verEstudiantes($id) {
        try {
            $item = new classEstudiantes();

            $stringSQL = "SELECT * FROM `estudiante` WHERE id = :id";
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

    public function actualizarEstudiantes($datos) {
        try {
            $datos['usuario'] = "Prof Mario";

            $stringSQL = 'UPDATE estudiante SET cedula = :cedula, correoelectronico = :correoelectronico, telefono = :telefono, telefonocelular = :telefonocelular, fechanacimiento = :fechanacimiento, sexo = :sexo, direccion = :direccion, nombre = :nombre, apellidopaterno = :apellidopaterno, apellidomaterno = :apellidomaterno, nacionalidad = :nacionalidad, idCarreras = :idCarreras, usuario = :usuario WHERE id = :id';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);

            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function eliminarEstudiantes($id) {
        try {
            $stringSQL = "DELETE FROM `estudiante` WHERE id = :id";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
?>
