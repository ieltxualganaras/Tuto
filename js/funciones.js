$(function() {
    
    var url = "backend/buscar.php";
    
    $.ajax({
        url : url,
        method : 'GET',
        dataType : 'json',
        success : function (data) {
            rellenarTabla(data);
        },
        error : function () {
            alert('error');
        }
   
    })
})


function rellenarTabla(data) {
    alert(data);
}



































//$(function() {
//
//    var url = "backend/buscar.php";
//
//    $.ajax({
//        url: url,
//        method: 'get',
//        dataType: 'json',
//        success: function(data) {
//            rellenarTabla(data);
//        },
//        error: function(data) {
//            alert('error al traer la data');
//        }
//    })
//})
//
//function rellenarTabla(data) {
//    var html = "";
//
//    $.each(data, function(clave, persona) {
//        html += '<tr>' +
//                   '<td>'+persona.nombre+'</td>' +
//                    '<td>'+persona.apellido+'</td>' +
//                    '<td>'+persona.dni+'</td>' +
//                    '<td>' +
//                       '<a class="pull-left"><span class="glyphicon glyphicon-pencil"></span>Editar</a>' +
//                       '<a class="pull-right"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>' +
//                    '</td>' +
//                '</tr>';
//    })
//    
//    $("#cuerpoTabla").html(html);
//}