<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BÁSICO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_index.css">
    <style>
        /* Personalización adicional del estilo si es necesario */
    </style>
</head>
<body>
    <div id="Header" class="bg-success text-white text-center py-4">
        <h1>GESTIÓN DE ALUMNOS</h1>
    </div>

    <div id="Insertar" class="container mt-4">
        <h2 class="mb-3">INSERTAR ALUMNOS</h2>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="id">ID ALUMNO</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="nombre">NOMBRE ALUMNO</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="sexo">SEXO ALUMNO</label>
                <input type="text" class="form-control" id="sexo" name="sexo" required>
            </div>
            <div class="form-group">
                <label for="edad">EDAD ALUMNO</label>
                <input type="text" class="form-control" id="edad" name="edad" required>
            </div>
            <input type="hidden" name="action" value="insert">
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>

    <div id="Listar" class="container mt-4">
        <h2>LISTAR ALUMNOS</h2>
        <table class="table table-bordered">
            <thead class="bg-info text-white">
                <tr>
                    <th>ID ALUMNO</th>
                    <th>NOMBRE ALUMNO</th>
                    <th>SEXO</th>
                    <th>EDAD</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos)) : ?>
                    <?php foreach ($datos as $alumno) : ?>
                        <tr>
                            <td><?php echo $alumno['IdAlumno']; ?></td>
                            <td><?php echo $alumno['NombreAlumno']; ?></td>
                            <td><?php echo $alumno['sexo']; ?></td>
                            <td><?php echo $alumno['EdadA']; ?></td>
                            <td>
                                <a href="index.php?action=view&id=<?php echo $alumno['IdAlumno']; ?>" class="btn btn-info btn-sm">Ver</a>
                                <a href="index.php?action=edit&id=<?php echo $alumno['IdAlumno']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $alumno['IdAlumno']; ?>')">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="5">No hay datos para mostrar</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar este alumno?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="index.php" method="POST">
                        <input type="hidden" name="id" id="deleteId" value="">
                        <input type="hidden" name="action" value="confirm_delete">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function confirmDelete(id) {
            $('#deleteId').val(id);
            $('#confirmDeleteModal').modal('show');
        }
    </script>
</body>
</html>
