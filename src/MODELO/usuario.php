<?php

require_once('../CONFIG/conexion.php');

class Clase_Modelo
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    // LISTAR
    public function Metodo_Listar()
    {
        $query = "SELECT * FROM usuario ORDER BY idusuario ASC";

        try {
            $stmt = $this->con->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // SELECCIONAR POR ID
    public function Metodo_Seleccionar($id)
    {
        $query = "SELECT * FROM usuario WHERE idusuario = :id";

        try {
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // ELIMINAR
    public function Metodo_Eliminar($id)
    {
        $query = "DELETE FROM usuario WHERE idusuario = :id";

        try {
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return "ok";

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // ACTUALIZAR
    public function Metodo_Actualizar(
        $idusuario,
        $nombre,
        $apellido,
        $telefono,
        $email
    ) {
        $query = "UPDATE usuario 
                  SET nombre = :nombre,
                      apellido = :apellido,
                      telefono = :telefono,
                      email = :email
                  WHERE idusuario = :idusuario";

        try {
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            return "ok";

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // INSERTAR
    public function Metodo_Insertar(
        $nombre,
        $apellido,
        $telefono,
        $email
    ) {
        $query = "INSERT INTO usuario
                  (nombre, apellido, telefono, email)
                  VALUES
                  (:nombre, :apellido, :telefono, :email)";

        try {
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            return "ok";

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // LOGIN
    public function Metodo_Login($email, $password)
    {
        $query = "SELECT * 
                  FROM usuario 
                  WHERE email = :email";

        try {
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contrasena'])) {
                return [$usuario];
            }

            return [];

        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
}
