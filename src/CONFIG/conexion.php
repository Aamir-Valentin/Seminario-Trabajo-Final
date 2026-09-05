<?php
if (!class_exists('Clase_Conexion')) {

    $servidor = 'localhost';
    $puerto = '3306';
    $usuario = 'root';
    $contra = '';
    $base = 'gestion_proyectos';

    class Clase_Conexion
    {
        public function Metodo_Conexion(
            $servidor,
            $puerto,
            $usuario,
            $contra,
            $base
        ) {

            try {

                $cadenaConexion = "mysql:host=$servidor;port=$puerto;dbname=$base;charset=utf8mb4";

                $con = new PDO(
                    $cadenaConexion,
                    $usuario,
                    $contra
                );

                // Mostrar errores de PDO como excepciones
                $con->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
                
                return $con;

            } catch (PDOException $e) {

                die("Error de conexión a MySQL: " . $e->getMessage());
            }
        }
    }

    $Obj_Conexion = new Clase_Conexion();

    $Conectar = $Obj_Conexion->Metodo_Conexion(
        $servidor,
        $puerto,
        $usuario,
        $contra,
        $base
    );
}
?>