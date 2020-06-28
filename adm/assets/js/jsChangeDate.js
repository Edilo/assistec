/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#changeDate').change(function(){
    var date = $('#changeDate').val();
    var dateFormat = date.split("-");
    
    $.ajax({
        type: "POST",
        url: "http://localhost/cisbioweb/adm/controle-home/gerarDashboardDinamico",
        data: {
            date: date
        },

        beforeSend: function () {
            
            $('#CafeQtd').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
            $('#AlmocoQtd').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
            $('#LancheQtd').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
            $('#TotalQtdDinamico').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
            $("#dataChange").html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:15px;'/>");
            
            $('#tableCafeDinamico').html('');
            $('#tableAlmocoDinamico').html('');
            $('#tableLancheDinamico').html('');
        },
        success: function (resultado) {
            $("#dataChange").html(""+dateFormat[2]+"/"+dateFormat[1]+"/"+dateFormat[0]+".");
            
            var retorno = resultado.split("+");
            $('#CafeQtd').html(retorno[0]);
            $('#AlmocoQtd').html(retorno[1]);
            $('#LancheQtd').html(retorno[2]);
            $('#TotalQtdDinamico').html(parseInt(retorno[0])+parseInt(retorno[1])+parseInt(retorno[2]));
            
            $('#tableCafeDinamico').html(retorno[3]);
            $('#tableAlmocoDinamico').html(retorno[4]);
            $('#tableLancheDinamico').html(retorno[5]);
            
        }
    });
});

