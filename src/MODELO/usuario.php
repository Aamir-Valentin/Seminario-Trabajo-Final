<?php
require_once('../CONFIG/conexion.php');
class Clase_Modelo
{

	private $con;

	public function __construct($con)
	{
		$this->con = $con;
	}

	public function Metodo_Listar()
	{
		// Método para listar todos los registros de la tabla usuario
		$query = "SELECT * FROM usuario ORDER BY idusuario ASC";

		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}

		$datos = [];

		while ($row = pg_fetch_assoc($result)) {
			$datos[] = $row; // Almacena cada fila en el array
		}

		return $datos; // Retorna todos los registros
	}

	public function Metodo_Seleccionar($id)
	{
		// Método para listar todos los registros de la tabla usuario
		$query = "SELECT * FROM usuario WHERE idusuario=$id";

		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}

		$datos = [];

		while ($row = pg_fetch_assoc($result)) {
			$datos[] = $row; // Almacena cada fila en el array
		}

		return $datos; // Retorna todos los registros
	}

	public function Metodo_Eliminar($id)
	{
		// Método para listar todos los registros de la tabla usuario
		$query = "DELETE FROM usuario WHERE idusuario=$id";

		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}
		return "ok"; // Retorna todos los registros
	}

	public function Metodo_Actualizar($idusuario, $nombre, $apellido, $telefono, $email)
	{
		// Método para listar todos los registros de la tabla usuario
		$query = "UPDATE usuario SET nombre='$nombre',apellido='$apellido',TELEFONO='$telefono',EMAIL='$email' WHERE idusuario=$idusuario;";

		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}
		return "ok"; // Retorna todos los registros
	}

	public function Metodo_Insertar($nombre, $apellido, $telefono, $email)
	{
		// Método para listar todos los registros de la tabla usuario
		$query = "INSERT INTO usuario(nombre,apellido,telefono,email) VALUES('$nombre','$apellido','$telefono','$email');";

		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}
		return "ok"; // Retorna todos los registros
	}

	public function Metodo_Login($email, $password)
	{
		// Método para listar todos los registros de la tabla usuario
		$claveEncriptada = crypt($password, "salt"); // Encripta la contraseña utilizando un salt fijo (puedes usar un salt dinámico para mayor seguridad)
		$query = "SELECT * FROM usuario WHERE email='$email' AND contrasena='$claveEncriptada';";
		echo "SELECT * FROM usuario WHERE email='$email' AND contrasena='$claveEncriptada';";
		exit;
		$result = pg_query($this->con, $query);

		if (!$result) {
			die("Error en la consulta: " . pg_last_error($this->con));
		}

		$datos = [];

		while ($row = pg_fetch_assoc($result)) {
			$datos[] = $row; // Almacena cada fila en el array
		}

		return $datos; // Retorna todos los registros
	} 

}
