function editarUsuario(id) {
    $("#editarModal").modal("show");
    seleccionarUsuario(id);
}

function eliminarUsuario(id) {
    $("#eliminarModal").modal("show");       
    $("#idusuarioEliminar").val(id);  
}

function nuevoUsuario(){
    $.ajax({
        type:"POST",
        url: "usuarioController.php",
        data:{
            accion:"nuevo",
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            telefono: $("#telefono").val(),
            email: $("#email").val(),
        },
        dataType:"json",
        success: function(data){
            console.log(data);
            alert("Usuario registrado correctamente");
            const usuario = $("#TablaUsuario tbody");
            usuario.empty();
            data.forEach(usu => {
                usuario.append(`
                    <tr>
                        <td>${usu.idusuario}</td>
                        <td>${usu.nombre}</td>
                        <td>${usu.apellido}</td>
                        <td>${usu.telefono}</td>
                        <td>${usu.email}</td>
                        <td>
                            <button class="btn btn-success" onclick="editarUsuario('${usu.idusuario}')">Editar</button>
                            <button class="btn btn-danger" onclick="eliminarUsuario('${usu.idusuario}')">Eliminar</button>
                        </td>
                    </tr>
                `);
            });
            //location.reload();
        },
        error: function(error){
            console.log(error);
            alert("Error creando un nuevo usuario");
        }
        
    });
    $("#insertarModal").modal("hide");
}

function seleccionarUsuario(id){
    $.ajax({
        type:"GET",
        url: "usuarioController.php",
        data:{
            accion:"seleccionar",
            idusuario: id
        },
        dataType:"json",
        success: function(data){
            console.log(data);
            $("#idusuarioEditar").val(data[0].idusuario);
            $("#nombreEditar").val(data[0].nombre);
            $("#apellidoEditar").val(data[0].apellido);
            $("#telefonoEditar").val(data[0].telefono);
            $("#emailEditar").val(data[0].email);
        },
        error: function(error){
            console.log(error);
            alert("Error seleccionando el usuario");
        }
    });
}
function actualizarUsuario() {
    $.ajax({
        type: "POST",
        url: "usuarioController.php",
        data: {
            accion: "editar",
            idusuario: $("#idusuarioEditar").val(),
            nombre: $("#nombreEditar").val(),
            apellido: $("#apellidoEditar").val(),
            telefono: $("#telefonoEditar").val(),
            email: $("#emailEditar").val()
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            alert("Usuario actualizado correctamente");
            $("#editarModal").modal("hide");
            location.reload();
        },
        error: function(error) {
            console.log(error);
            alert("Error actualizando el usuario");
        }
    });
}

function borrarUsuario() {
    $.ajax({
        type: "POST",   
        url: "usuarioController.php",
        data: {
            accion: "eliminar",
            idusuario: $("#idusuarioEliminar").val()
        },
        dataType: "json",
        success: function(data) {       
            console.log(data);
            $("#eliminarModal").modal("hide");
            alert("Usuario eliminado correctamente");
            location.reload();
        },
        error: function(error) {
            console.log(error);
            alert("Error eliminando el usuario");
        }
    });
}