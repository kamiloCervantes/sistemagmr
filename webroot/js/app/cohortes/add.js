/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var cohortes_add = {};

cohortes_add.init = function(){
    $('#fecha-inicio').datepicker({
        language: "es",
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
}

$(cohortes_add.init);