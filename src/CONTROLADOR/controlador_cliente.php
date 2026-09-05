<?php
require_once('MODELO/cliente.php');
session_start();

class Controlador_Cliente {
    private $modelo;

    public function __construct() {
        require_once('CONFIG/conexion.php');
        // Usar la conexión incluida desde CONFIG/conexion.php
        $conexion = new mysqli("localhost", "root", "", "gestion_proyectos");
        
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        
        $this->modelo = new Clase_Modelo($conexion);
    }

    public function index() {
        // Verificar autenticación (opcional, descomentar si tienes sistema de login)
        // if (!isset($_SESSION['usuario_id'])) {
        //     header('Location: index.php?controlador=usuario&accion=login');
        //     exit();
        // }
        
        // Obtener todos los clientes
        $clientes = $this->modelo->Metodo_Listar();
        
        // Variables para la vista
        $mensaje = '';
        $cliente_editar = null;
        $cliente_ver = null;
        
        // Procesar formularios POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['accion_form'])) {
                if ($_POST['accion_form'] == 'insertar') {
                    // Validar campos
                    $documento = trim($_POST['documento']);
                    $razon_social = trim($_POST['razon_social']);
                    $correo = trim($_POST['correo']);
                    $telefono = trim($_POST['telefono']);
                    $estado = $_POST['estado'];
                    
                    // Validaciones básicas
                    if (empty($documento) || empty($razon_social) || empty($correo)) {
                        $mensaje = "Error: Todos los campos son obligatorios.";
                    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                        $mensaje = "Error: El correo electrónico no es válido.";
                    } else {
                        $resultado = $this->modelo->Metodo_Insertar(
                            $documento,
                            $razon_social,
                            $correo,
                            $telefono,
                            $estado
                        );
                        $mensaje = $resultado;
                    }
                    
                } elseif ($_POST['accion_form'] == 'editar') {
                    // Validar campos
                    $id_cliente = intval($_POST['id_cliente']);
                    $documento = trim($_POST['documento']);
                    $razon_social = trim($_POST['razon_social']);
                    $correo = trim($_POST['correo']);
                    $telefono = trim($_POST['telefono']);
                    $estado = $_POST['estado'];
                    
                    // Validaciones básicas
                    if (empty($documento) || empty($razon_social) || empty($correo)) {
                        $mensaje = "Error: Todos los campos son obligatorios.";
                    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                        $mensaje = "Error: El correo electrónico no es válido.";
                    } else {
                        $resultado = $this->modelo->Metodo_Editar(
                            $id_cliente,
                            $documento,
                            $razon_social,
                            $correo,
                            $telefono,
                            $estado
                        );
                        $mensaje = $resultado;
                    }
                }
            }
        }
        
        // Procesar acciones GET
        if (isset($_GET['accion'])) {
            $accion = $_GET['accion'];
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            
            switch ($accion) {
                case 'editar':
                    if ($id) {
                        $cliente_editar = $this->modelo->Metodo_Ver($id);
                    }
                    break;
                    
                case 'ver':
                    if ($id) {
                        $cliente_ver = $this->modelo->Metodo_Ver($id);
                    }
                    break;
                    
                case 'eliminar':
                    if ($id) {
                        $mensaje = $this->modelo->Metodo_Eliminar($id);
                        // Recargar lista
                        $clientes = $this->modelo->Metodo_Listar();
                    }
                    break;
            }
        }
        
        // Recargar clientes si hubo cambios POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientes = $this->modelo->Metodo_Listar();
        }
        
        // Cargar la vista
        require_once('VISTA/vista_cliente_unificada.php');
    }
}
?>