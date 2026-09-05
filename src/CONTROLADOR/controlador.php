<?php
require_once("MODELO/modelo.php");


$Obj_Modelo = new Clase_Modelo($Conectar);
$datos = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action === 'list') {
            $datos = $Obj_Modelo->Metodo_Listar();
            require_once("VISTA/index.php");
        } elseif ($action === 'view') {
            $id = $_GET['id'];
            $alumno = $Obj_Modelo->Metodo_Ver($id);
            require_once("VISTA/view.php");
        } elseif ($action === 'edit') {
            $id = $_GET['id'];
            $alumno = $Obj_Modelo->Metodo_Ver($id);
            require_once("VISTA/edit.php");
        } elseif ($action === 'delete') {
            $id = $_GET['id'];
            // Mostrar confirmación de eliminación en un modal
            $mensaje_eliminar = "¿Estás seguro de eliminar este registro?";
            require_once("VISTA/delete_confirm.php");
        }
    } else {
        $datos = $Obj_Modelo->Metodo_Listar(); // Por defecto listará los alumnos
        require_once("VISTA/index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'insert') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];

            // Verificar si el ID ya existe
            $alumno_existente = $Obj_Modelo->Metodo_Ver($id);
            if ($alumno_existente) {
                $mensaje_id_duplicado = true;
                $datos = $Obj_Modelo->Metodo_Listar(); // Recargar lista de alumnos
                require_once("VISTA/index.php");
            } else {
                $mensaje = $Obj_Modelo->Metodo_Insertar($id, $nombre, $sexo, $edad);
                header("Location: index.php?action=list");
                exit;
            }
        } elseif ($action === 'update') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];

            $mensaje = $Obj_Modelo->Metodo_Editar($id, $nombre, $sexo, $edad);

            // Redireccionar después de la actualización
            header("Location: index.php?action=list");
            exit;
        } elseif ($action === 'confirm_delete') {
            $id = $_POST['id'];
            $mensaje = $Obj_Modelo->Metodo_Eliminar($id);
            header("Location: index.php?action=list");
            exit;
        }
    }
}
?>
