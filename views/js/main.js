// activar dataTable

    $(".tablas").DataTable({
        "language": {
            "sProcessing":      "Prosesando...",
            "sLengthMenu":      "Mostrar _MENU_ registros",
            "sZeroRecords":     "No se encontraron resultados",
            "sEmptyTable":      "Ningún dato disponible en esta tabla",
            "sInfo":            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":       "Mostrando registros del 0 al 0 de un todal de 0",
            "sInfoFiltered":    "(filtrando de un total de _MAX_ registros)",
            "sInfoPostFix":     "",
            "sSearch":          "Buscar",
            "sUrl":             "",
            "sInfoThousands":   ",",
            "sLoadingRecords":  "Cargando",
            "oPaginate":{
                "sFirst":   "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious":"Anterior"
            },
            "oAria":{
                "sSortAscending":   "Activar para ordenar la columna de manera ascendente",
                "sSortDescending":  "Activar par ordenar la columna de mandera descendente"
            }
        }
    });