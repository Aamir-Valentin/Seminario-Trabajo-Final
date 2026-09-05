<?php
// Protege contra inclusiones múltiples
if (!class_exists('Clase_Conexion')) {
    $servidor = 'localhost';
    $puerto = '5432';
    $usuario = 'postgres';
    $contra = 'postgres';
    $base = 'RENIEC';

    class Clase_Conexion {
        public function Metodo_Conexion($servidor, $puerto, $usuario, $contra, $base) {
            
            $cadenaConexion = "
                host=$servidor
                port=$puerto
                dbname=$base
                user=$usuario
                password=$contra
            ";

            $con = pg_connect($cadenaConexion);

            if (!$con) {
                die("Error de conexión a PostgreSQL");
            }

            return $con;
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
