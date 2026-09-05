<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_index.css">
</head>
<body>
    <div id="View">
        <h2>VER ALUMNO</h2>
        <p><strong>ID Alumno:</strong> <?php echo $alumno['IdAlumno']; ?></p>
        <p><strong>Nombre Alumno:</strong> <?php echo $alumno['NombreAlumno']; ?></p>
        <p><strong>Sexo Alumno:</strong> <?php echo $alumno['sexo']; ?></p>
        <p><strong>Edad Alumno:</strong> <?php echo $alumno['EdadA']; ?></p>
        <button onclick="location.href='index.php?action=list'" class="button button-return">Return</button>
    </div>
</body>
</html>
