<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_index.css">
</head>
<body>
    <div id="Edit">
        <h2>EDITAR ALUMNO</h2>
        <form method="POST" action="index.php">
            <label>NOMBRE ALUMNO</label><br>
            <input type="text" name="nombre" value="<?php echo $alumno['NombreAlumno']; ?>"><br>

            <label>SEXO ALUMNO</label><br>
            <input type="text" name="sexo" value="<?php echo $alumno['sexo']; ?>"><br>

            <label>EDAD ALUMNO</label><br>
            <input type="text" name="edad" value="<?php echo $alumno['EdadA']; ?>"><br>
            <br>
            <input type="hidden" name="id" value="<?php echo $alumno['IdAlumno']; ?>">
            <input type="hidden" name="action" value="update">
            <input type="submit" value="Actualizar" class="button button-update">
        </form>
    </div>
</body>
</html>
