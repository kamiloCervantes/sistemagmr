/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var estudiantes_add = {};

estudiantes_add.init = function(){
    $('#fecha-nacimiento').datepicker({
        language: "es",
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
    $('#fecha-ingreso').datepicker({
        language: "es",
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
    
    $('#institucion').select2({
        placeholder: 'Seleccione una opción...',
        theme: "bootstrap"       
    }).on('change', function(){
         $("#cohortes-id").select2('val', " ");
    });
    
    $("#cohortes-id").select2({
        placeholder: 'Seleccione una opción...',
        theme: "bootstrap",
        ajax: {
        url: "/estudiantes/getcohortesinstitucion.json",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            param: $("#institucion").val()
          };
        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used

          return {
            results: data.cohortes
          };
        },
        cache: true
      },
      escapeMarkup: function (markup) { return markup; },
      templateResult: function(d){ return d.nombre;  },
      templateSelection: function(d){ return d.text; }
      
    });
    
   
}

$(estudiantes_add.init);


 