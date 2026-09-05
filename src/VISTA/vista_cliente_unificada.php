<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 0.9em;
        }
        
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 20px;
        }
        
        .section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #e9ecef;
        }
        
        .section-title {
            color: #495057;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .section-title h2 {
            font-size: 1.3em;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }
        
        .btn-warning {
            background: #ffc107;
            color: #333;
        }
        
        .btn-warning:hover {
            background: #e0a800;
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background: #c82333;
        }
        
        .btn-info {
            background: #17a2b8;
            color: white;
        }
        
        .btn-info:hover {
            background: #138496;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: opacity 0.5s;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .form-group input:disabled,
        .form-group select:disabled {
            background: #e9ecef;
        }
        
        .form-actions {
            margin-top: 20px;
            text-align: right;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-activo {
            background: #28a745;
            color: white;
        }
        
        .badge-inactivo {
            background: #dc3545;
            color: white;
        }
        
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        
        .modal-content {
            background: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }
        
        .modal-header h3 {
            color: #495057;
        }
        
        .close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #495057;
            text-decoration: none;
        }
        
        .close:hover {
            color: #dc3545;
        }
        
        .detail-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
        }
        
        .detail-value {
            color: #6c757d;
        }
        
        .btn-volver {
            background: #6c757d;
            color: white;
            margin-top: 20px;
            text-align: center;
            display: inline-block;
        }
        
        .btn-volver:hover {
            background: #5a6268;
        }
        
        .search-box {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
        
        .search-box input {
            flex: 1;
            padding: 10px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
        }
        
        .empty-state i {
            font-size: 48px;
            margin-bottom: 10px;
            display: block;
        }
        
        .empty-state p {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Sistema de Gestión de Clientes</h1>
            <p>Administra todos tus clientes en un solo lugar</p>
        </div>
        
        <div class="content">
            <?php if (isset($mensaje) && $mensaje != ''): ?>
                <div class="alert <?php echo strpos($mensaje, 'Error') !== false ? 'alert-error' : 'alert-success'; ?>" style="grid-column: 1/-1;">
                    <span><?php echo $mensaje; ?></span>
                    <button class="close" onclick="this.parentElement.remove()">&times;</button>
                </div>
            <?php endif; ?>
            
            <!-- Sección: Formulario -->
            <div class="section">
                <div class="section-title">
                    <h2><?php echo isset($cliente_editar) ? '✏️ Editar Cliente' : '➕ Nuevo Cliente'; ?></h2>
                    <?php if(isset($cliente_editar)): ?>
                        <a href="index.php?controlador=cliente" class="btn btn-sm btn-danger">Cancelar Edición</a>
                    <?php endif; ?>
                </div>
                
                <form method="POST" action="index.php?controlador=cliente">
                    <input type="hidden" name="accion_form" value="<?php echo isset($cliente_editar) ? 'editar' : 'insertar'; ?>">
                    
                    <?php if(isset($cliente_editar)): ?>
                        <input type="hidden" name="id_cliente" value="<?php echo $cliente_editar['id_cliente']; ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label for="documento">Documento *</label>
                        <input type="text" id="documento" name="documento" 
                               value="<?php echo isset($cliente_editar) ? htmlspecialchars($cliente_editar['documento']) : ''; ?>" 
                               required placeholder="Ej: 1234567890">
                    </div>
                    
                    <div class="form-group">
                        <label for="razon_social">Razón Social *</label>
                        <input type="text" id="razon_social" name="razon_social" 
                               value="<?php echo isset($cliente_editar) ? htmlspecialchars($cliente_editar['razon_social']) : ''; ?>" 
                               required placeholder="Ej: Empresa S.A.S">
                    </div>
                    
                    <div class="form-group">
                        <label for="correo">Correo Electrónico *</label>
                        <input type="email" id="correo" name="correo" 
                               value="<?php echo isset($cliente_editar) ? htmlspecialchars($cliente_editar['correo']) : ''; ?>" 
                               required placeholder="ejemplo@correo.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono">Teléfono *</label>
                        <input type="text" id="telefono" name="telefono" 
                               value="<?php echo isset($cliente_editar) ? htmlspecialchars($cliente_editar['telefono']) : ''; ?>" 
                               required placeholder="Ej: 3001234567">
                    </div>
                    
                    <div class="form-group">
                        <label for="estado">Estado *</label>
                        <select id="estado" name="estado" required>
                            <option value="Activo" <?php echo (isset($cliente_editar) && $cliente_editar['estado'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                            <option value="Inactivo" <?php echo (isset($cliente_editar) && $cliente_editar['estado'] == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <?php echo isset($cliente_editar) ? '💾 Actualizar Cliente' : '💾 Guardar Cliente'; ?>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Sección: Lista de Clientes -->
            <div class="section">
                <div class="section-title">
                    <h2>📊 Lista de Clientes</h2>
                    <span class="badge" style="background: #667eea; color: white;">
                        <?php echo count($clientes); ?> Clientes
                    </span>
                </div>
                
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="🔍 Buscar clientes..." onkeyup="filterTable()">
                </div>
                
                <div class="table-container">
                    <table id="clientesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Razón Social</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clientes) > 0): ?>
                                <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['documento']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['razon_social']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                                    <td>
                                        <span class="badge <?php echo $cliente['estado'] == 'Activo' ? 'badge-activo' : 'badge-inactivo'; ?>">
                                            <?php echo htmlspecialchars($cliente['estado']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="index.php?controlador=cliente&accion=ver&id=<?php echo $cliente['id_cliente']; ?>" 
                                           class="btn btn-sm btn-info" title="Ver Detalles">👁️</a>
                                        <a href="index.php?controlador=cliente&accion=editar&id=<?php echo $cliente['id_cliente']; ?>" 
                                           class="btn btn-sm btn-warning" title="Editar">✏️</a>
                                        <a href="index.php?controlador=cliente&accion=eliminar&id=<?php echo $cliente['id_cliente']; ?>" 
                                           class="btn btn-sm btn-danger" title="Eliminar" 
                                           onclick="return confirm('¿Estás seguro de eliminar este cliente?')">🗑️</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i>📭</i>
                                            <p>No hay clientes registrados</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Modal para ver detalles -->
        <?php if (isset($cliente_ver) && $cliente_ver): ?>
        <div class="modal" id="detailModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>📋 Detalles del Cliente</h3>
                    <a href="index.php?controlador=cliente" class="close">&times;</a>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">ID Cliente:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($cliente_ver['id_cliente']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Documento:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($cliente_ver['documento']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Razón Social:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($cliente_ver['razon_social']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Correo:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($cliente_ver['correo']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Teléfono:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($cliente_ver['telefono']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Estado:</div>
                    <div class="detail-value">
                        <span class="badge <?php echo $cliente_ver['estado'] == 'Activo' ? 'badge-activo' : 'badge-inactivo'; ?>">
                            <?php echo htmlspecialchars($cliente_ver['estado']); ?>
                        </span>
                    </div>
                </div>
                
                <div class="form-actions">
                    <a href="index.php?controlador=cliente&accion=editar&id=<?php echo $cliente_ver['id_cliente']; ?>" 
                       class="btn btn-warning">✏️ Editar</a>
                    <a href="index.php?controlador=cliente" class="btn btn-secondary">Cerrar</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Botón para volver al inicio -->
        <div style="padding: 20px; text-align: center;">
            <a href="index.php" class="btn btn-volver">🏠 Volver al Inicio</a>
        </div>
    </div>
    
    <script>
        function filterTable() {
            var input = document.getElementById("searchInput");
            var filter = input.value.toUpperCase();
            var table = document.getElementById("clientesTable");
            var tr = table.getElementsByTagName("tr");
            
            for (var i = 1; i < tr.length; i++) {
                var row = tr[i];
                var found = false;
                
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    if (cell) {
                        var txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                
                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        
        // Auto-cerrar alertas después de 5 segundos
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
        
        // Ocultar modal al hacer clic fuera
        window.onclick = function(event) {
            var modal = document.getElementById('detailModal');
            if (event.target == modal) {
                window.location.href = 'index.php?controlador=cliente';
            }
        }
        
        // Función para validar el formulario antes de enviar
        document.querySelector('form').addEventListener('submit', function(e) {
            var documento = document.getElementById('documento').value;
            var razonSocial = document.getElementById('razon_social').value;
            var correo = document.getElementById('correo').value;
            var telefono = document.getElementById('telefono').value;
            
            // Validación básica
            if (documento.trim() === '' || razonSocial.trim() === '' || correo.trim() === '' || telefono.trim() === '') {
                e.preventDefault();
                alert('Por favor complete todos los campos obligatorios.');
            }
        });
    </script>
</body>
</html>