<?php
require_once('CONFIG/conexion.php');
class Clase_Modelo {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function Metodo_Listar() {
        // Método para listar todos los registros de la tabla alumnos
        $query = "SELECT * FROM alumnos";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($this->con));
        }

        $datos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $datos[] = $row; // Almacena cada fila de resultado en un array
        }

        return $datos; // Retorna un array con todos los registros de alumnos
    }

    public function Metodo_Insertar($id, $nombre, $sexo, $edad) {
        // Método para insertar un nuevo registro en la tabla alumnos
        $insertQuery = "INSERT INTO alumnos (IdAlumno, NombreAlumno, sexo, EdadA) VALUES ('$id', '$nombre', '$sexo', '$edad')";
        if (mysqli_query($this->con, $insertQuery)) {
            return "Alumno insertado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al insertar alumno: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Editar($id, $nombre, $sexo, $edad) {
        // Método para actualizar un registro en la tabla alumnos
        $updateQuery = "UPDATE alumnos SET NombreAlumno='$nombre', sexo='$sexo', EdadA='$edad' WHERE IdAlumno='$id'";
        if (mysqli_query($this->con, $updateQuery)) {
            return "Alumno actualizado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al actualizar alumno: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Eliminar($id) {
        // Método para eliminar un registro de la tabla alumnos
        $deleteQuery = "DELETE FROM alumnos WHERE IdAlumno='$id'";
        if (mysqli_query($this->con, $deleteQuery)) {
            return "Alumno eliminado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al eliminar alumno: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Ver($id) {
        // Método para obtener un solo registro de la tabla alumnos por su ID
        $result = mysqli_query($this->con, "SELECT * FROM alumnos WHERE IdAlumno='$id'");
        return mysqli_fetch_assoc($result); // Retorna los datos del alumno como un array asociativo
    }
}
?>
