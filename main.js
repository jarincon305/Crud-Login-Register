var user_id, opcion;
opcion = 'get';
    
tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url"       : "crudHome/crud.php", 
        "method"    : 'POST',
        "data"      : { opcion: opcion },
        "dataSrc"   :  ""
    },
    "columns":[
        {"data": "DOC_ID"},
        {"data": "DOC_NOMBRE"},
        {"data": "DOC_CODIGO"},
        {"data": "DOC_CONTENIDO"},
        {"data": "PRO_PREFIJO"},
        {"data": "TIP_NOMBRE"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
$('#formUsuarios').submit(function(e){                         
    e.preventDefault();
    name        = $.trim($('#name').val());    
    code        = $.trim($('#code').val());
    contents    = $.trim($('#contents').val());    
    type        = $.trim($('#type').val());    
    process     = $.trim($('#process').val());
        $.ajax({
            url: "crudHome/crud.php",
            type: "POST",
            datatype:"json",    
            data:  {user_id: user_id, name: name, code: code, contents: contents, type: type, process: process , opcion: opcion},    
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
//limpiar los campos
$("#btnNuevo").click(function(){
    opcion  = 'insert';         
    user_id = null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar nuevo usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion      = 'update';
    fila        = $(this).closest("tr");	        
    user_id     = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    name        = fila.find('td:eq(1)').text();
    // code        = fila.find('td:eq(2)').text();
    contents    = fila.find('td:eq(3)').text();
    type        = fila.find('td:eq(4)').text();
    process     = fila.find('td:eq(5)').text();
    $("#name").val(name);
    // $("#code").val(code);
    $("#contents").val(contents);
    $("#type").val(type);
    $("#process").val(process);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);      
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 'delete';        
    var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
    if (respuesta) {            
        $.ajax({
            url: "crudHome/crud.php",
            type: "POST",
            datatype:"json",    
            data:  {opcion: opcion, user_id: user_id},    
            success: function() {
                tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
            }
        });	
    }
});