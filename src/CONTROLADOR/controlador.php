<?php

require_once("MODELO/proyecto.php");

$Obj_Modelo = new Clase_Proyecto($Conectar);
$datos = [];


// =====================================================
// MÉTODOS GET
// =====================================================

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['action'])) {

        $action = $_GET['action'];


        // LISTAR PROYECTOS
        if ($action === 'list') {

            $datos = $Obj_Modelo->Metodo_Listar();

            require_once("VISTA/index.php");


        // VER PROYECTO
        } elseif ($action === 'view') {

            $id = $_GET['id'];

            $proyecto = $Obj_Modelo->Metodo_Seleccionar($id);

            require_once("VISTA/view.php");


        // EDITAR PROYECTO
        } elseif ($action === 'edit') {

            $id = $_GET['id'];

            $proyecto = $Obj_Modelo->Metodo_Seleccionar($id);

            require_once("VISTA/edit.php");


        // ELIMINAR PROYECTO
        } elseif ($action === 'delete') {

            $id = $_GET['id'];

            // Mostrar confirmación de eliminación
            $mensaje_eliminar = "¿Estás seguro de eliminar este proyecto?";

            require_once("VISTA/delete_confirm.php");
        }

    } else {

        // Por defecto, listar proyectos
        $datos = $Obj_Modelo->Metodo_Listar();

        require_once("VISTA/index.php");
    }
}


// =====================================================
// MÉTODOS POST
// =====================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {

        $action = $_POST['action'];


        // =================================================
        // INSERTAR
        // =================================================

        if ($action === 'insert') {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $estado = $_POST['estado'];


            $mensaje = $Obj_Modelo->Metodo_Insertar(
                $nombre,
                $descripcion,
                $fecha_inicio,
                $fecha_fin,
                $estado
            );


            // Redireccionar después de insertar
            header("Location: index.php?action=list");
            exit;
        }


        // =================================================
        // ACTUALIZAR
        // =================================================

        elseif ($action === 'update') {

            $idproyecto = $_POST['idproyecto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $estado = $_POST['estado'];


            $mensaje = $Obj_Modelo->Metodo_Actualizar(
                $idproyecto,
                $nombre,
                $descripcion,
                $fecha_inicio,
                $fecha_fin,
                $estado
            );

            header("Location: index.php?action=list");
            exit;
        }


        // =================================================
        // CONFIRMAR ELIMINACIÓN
        // =================================================

        elseif ($action === 'confirm_delete') {

            $id = $_POST['id'];


            $mensaje = $Obj_Modelo->Metodo_Eliminar($id);


            // Redireccionar después de eliminar
            header("Location: index.php?action=list");
            exit;
        }
    }
}

?>