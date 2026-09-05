<?php
require_once("../MODELO/usuario.php");

$Obj_Modelo = new Clase_Modelo($Conectar);

//Metodos GET de consulta y POST de inserción, actualización y eliminación
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["accion"]) && $_GET["accion"] === "listar") {
        $datos = [];
        $datos = $Obj_Modelo->Metodo_Listar(); // Por defecto listará los animals
        require_once("../VISTA/index.php");
    } else {
        if (isset($_GET["accion"]) && $_GET["accion"] === "seleccionar" && isset($_GET["idusuario"])) {
            $datos = [];
            $datos = $Obj_Modelo->Metodo_Seleccionar($_GET["idusuario"]); // Por defecto listará los animals
            //require_once("../VISTA/index.php");
            echo json_encode($datos);
        }
    }
} else {    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST["accion"]) && $_POST["accion"] === "nuevo") {
            $datos = $Obj_Modelo->Metodo_Insertar($_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["email"]); // Por defecto listará los animals
            $datos = [];
            $datos = $Obj_Modelo->Metodo_Listar();
            echo json_encode($datos);
        } else {
            if (isset($_POST["accion"]) && $_POST["accion"] === "editar") {
                $datos = $Obj_Modelo->Metodo_Actualizar($_POST["idusuario"], $_POST["nombre"], $_POST["apellido"], $_POST["telefono"], $_POST["email"]); // Por defecto listará los animals
                echo json_encode($datos);
                //require_once("../VISTA/index.php");
            } else {
                if (isset($_POST["accion"]) && $_POST["accion"] === "eliminar") {
                    $datos = $Obj_Modelo->Metodo_Eliminar($_POST["idusuario"]); // Por defecto listará los animals
                    //require_once("../VISTA/index.php");
                    echo json_encode($datos);   
                }else{

                    //Metodo para el login
                    if (isset($_POST["accion"]) && $_POST["accion"] === "login") {
                        $datos = $Obj_Modelo->Metodo_Login($_POST["email"], $_POST["password"]); // Por defecto listará los animals
                        echo json_encode($datos);

                    }
                }
            }
        }
    }
}
