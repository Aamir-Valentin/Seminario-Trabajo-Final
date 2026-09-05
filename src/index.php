<?php 
require_once("CONFIG/conexion.php");

require_once('CONTROLADOR/controlador_cliente.php');

$controlador = new Controlador_Cliente();

if (isset($_GET['controlador']) && $_GET['controlador'] == 'cliente') {
    $controlador->index();
} else {
    // Página de inicio principal
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                margin: 0;
                padding: 20px;
                min-height: 100vh;
            }
            
            .container {
                max-width: 800px;
                margin: 0 auto;
                background-color: white;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                text-align: center;
            }
            
            h1 {
                color: #333;
                margin-bottom: 30px;
                font-size: 2.5em;
            }
            
            .menu {
                display: flex;
                flex-direction: column;
                gap: 15px;
                margin-top: 30px;
            }
            
            .menu-item {
                display: block;
                padding: 15px 20px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                text-decoration: none;
                border-radius: 10px;
                font-size: 18px;
                transition: all 0.3s;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }
            
            .menu-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
            }
            
            .icon {
                margin-right: 10px;
                font-size: 24px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>🏢 Sistema de Gestión</h1>
            <p style="color: #6c757d; margin-bottom: 30px;">Bienvenido al sistema de gestión empresarial</p>
            
            <div class="menu">
                <a href="index.php?controlador=cliente&accion=index" class="menu-item">
                    <span class="icon">📋</span> Gestión de Clientes
                </a>
                <!-- Puedes agregar más módulos aquí -->
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>