<?php
require_once('CONFIG/conexion.php');

class Clase_Modelo {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function Metodo_Listar() {
        // Método para listar todos los registros de la tabla clientes
        $query = "SELECT * FROM Cliente";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($this->con));
        }

        $datos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $datos[] = $row;
        }

        return $datos;
    }

    public function Metodo_Insertar($documento, $razon_social, $correo, $telefono, $estado) {
        // Usar consulta preparada para evitar inyección SQL
        $insertQuery = "INSERT INTO Cliente (documento, razon_social, correo, telefono, estado) 
                        VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($this->con, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sssss", $documento, $razon_social, $correo, $telefono, $estado);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return "Cliente insertado correctamente.";
        } else {
            $error = mysqli_error($this->con);
            mysqli_stmt_close($stmt);
            return "Error al insertar cliente: " . $error;
        }
    }

    public function Metodo_Editar($id_cliente, $documento, $razon_social, $correo, $telefono, $estado) {
        // Usar consulta preparada
        $updateQuery = "UPDATE Cliente SET documento=?, razon_social=?, correo=?, telefono=?, estado=? 
                        WHERE id_cliente=?";
        
        $stmt = mysqli_prepare($this->con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "sssssi", $documento, $razon_social, $correo, $telefono, $estado, $id_cliente);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return "Cliente actualizado correctamente.";
        } else {
            $error = mysqli_error($this->con);
            mysqli_stmt_close($stmt);
            return "Error al actualizar cliente: " . $error;
        }
    }

    public function Metodo_Eliminar($id_cliente) {
        // Usar consulta preparada
        $deleteQuery = "DELETE FROM Cliente WHERE id_cliente=?";
        
        $stmt = mysqli_prepare($this->con, $deleteQuery);
        mysqli_stmt_bind_param($stmt, "i", $id_cliente);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return "Cliente eliminado correctamente.";
        } else {
            $error = mysqli_error($this->con);
            mysqli_stmt_close($stmt);
            return "Error al eliminar cliente: " . $error;
        }
    }

    public function Metodo_Ver($id_cliente) {
        // Usar consulta preparada
        $query = "SELECT * FROM Cliente WHERE id_cliente=?";
        $stmt = mysqli_prepare($this->con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id_cliente);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $row;
    }
}
?>