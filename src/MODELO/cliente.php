<?php
require_once('CONFIG/conexion.php');
class Clase_Modelo {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function Metodo_Listar() {
        // Método para listar todos los registros de la tabla clientes
        $query = "SELECT * FROM clientes";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($this->con));
        }

        $datos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $datos[] = $row; // Almacena cada fila de resultado en un array
        }

        return $datos; // Retorna un array con todos los registros de clientes
    }

    public function Metodo_Insertar($id_cliente, $documento, $razon_social, $correo, $telefono, $estado) {
        // Método para insertar un nuevo registro en la tabla clientes
        $insertQuery = "INSERT INTO clientes (id_cliente, documento, razon_social, correo, telefono, estado) 
                        VALUES ('$id_cliente', '$documento', '$razon_social', '$correo', '$telefono', '$estado')";
        if (mysqli_query($this->con, $insertQuery)) {
            return "Cliente insertado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al insertar cliente: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Editar($id_cliente, $documento, $razon_social, $correo, $telefono, $estado) {
        // Método para actualizar un registro en la tabla clientes
        $updateQuery = "UPDATE clientes SET documento='$documento', razon_social='$razon_social', correo='$correo', telefono='$telefono', estado='$estado' 
                        WHERE id_cliente='$id_cliente'";
        if (mysqli_query($this->con, $updateQuery)) {
            return "Cliente actualizado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al actualizar cliente: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Eliminar($id_cliente) {
        // Método para eliminar un registro de la tabla clientes
        $deleteQuery = "DELETE FROM clientes WHERE id_cliente='$id_cliente'";
        if (mysqli_query($this->con, $deleteQuery)) {
            return "Cliente eliminado correctamente."; // Retorna mensaje de éxito
        } else {
            return "Error al eliminar cliente: " . mysqli_error($this->con); // Retorna mensaje de error
        }
    }

    public function Metodo_Ver($id_cliente) {
        // Método para obtener un solo registro de la tabla clientes por su ID
        $result = mysqli_query($this->con, "SELECT * FROM clientes WHERE id_cliente='$id_cliente'");
        return mysqli_fetch_assoc($result); // Retorna los datos del cliente como un array asociativo
    }
}
?>