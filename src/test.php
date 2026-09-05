<?php
include(".\CONFIG\conexion.php");

// Verificar conexión
if ($Conectar) {
    echo "✅ Conexión exitosa a PostgreSQL <br><br>";

    // Consulta de prueba
    $consulta = "SELECT version();";

    $resultado = pg_query($Conectar, $consulta);

    if ($resultado) {
        $fila = pg_fetch_row($resultado);

        echo "📌 Versión de PostgreSQL:<br>";
        echo $fila[0];
    } else {
        echo "❌ Error en la consulta";
    }

} else {
    echo "❌ No se pudo conectar";
}
?>