/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$('#btnSearchRelGer').click(function () {
    var evento = $('#evento').val();
    var dtini = $('#dtini').val();
    var dtfin = $('#dtfin').val();

    if (dtini === "") {
        alert("Selecione uma data inicial!");
        $('#dtini').focus();
    } else if (dtfin === ""){
        alert("Selecione uma data final!");
        $('#dtfin').focus();
    }else if (dtini>dtfin){
        alert("Data inicial maior que data final corriga!");
        $('#dtini').focus();
    }else{
        $.ajax({
            type: "POST",
            url: "http://localhost/cisbioweb/adm/controle-relatorio/gerarRelatorio",
            data: {
                evento: evento,
                dtini: dtini,
                dtfin: dtfin
            },
            beforeSend: function () {
                $('#CafeQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#AlmocoQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#LancheQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#JantaQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#CeiaQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#TotalQtdRel').html("<img src='http://localhost/cisbioweb/adm/assets/image/icone/carregando.gif' style='width:20px;'/>");
                $('#tabelaRegistro').html("");
            },
            success: function (resultado) {
                var qtdEvento = resultado.split("+");
                if (evento === '8') {
                    $('#CafeQtdRel').html(qtdEvento[0]);
                    $('#AlmocoQtdRel').html("");
                    $('#LancheQtdRel').html("");
                    $('#JantaQtdRel').html("");
                    $('#CeiaQtdRel').html("");
                    var qdtGeral = parseInt(qtdEvento[0]);
                } else if (evento === '9') {
                    $('#CafeQtdRel').html("");
                    $('#AlmocoQtdRel').html(qtdEvento[1]);
                    $('#LancheQtdRel').html("");
                    $('#JantaQtdRel').html("");
                    $('#CeiaQtdRel').html("");
                    var qdtGeral = parseInt(qtdEvento[1]);
                } else if (evento === '10') {
                    $('#CafeQtdRel').html("");
                    $('#AlmocoQtdRel').html("");
                    $('#LancheQtdRel').html(qtdEvento[2]);
                    $('#JantaQtdRel').html("");
                    $('#CeiaQtdRel').html("");
                    var qdtGeral = parseInt(qtdEvento[2]);
                } else if (evento === '12') {
                    $('#CafeQtdRel').html("");
                    $('#AlmocoQtdRel').html("");
                    $('#LancheQtdRel').html("");
                    $('#JantaQtdRel').html(qtdEvento[3]);
                    $('#CeiaQtdRel').html(qtdEvento[3]);
                    var qdtGeral = parseInt(qtdEvento[3]) + parseInt(qtdEvento[3]);
                } else {
                    $('#CafeQtdRel').html(qtdEvento[0]);
                    $('#AlmocoQtdRel').html(qtdEvento[1]);
                    $('#LancheQtdRel').html(qtdEvento[2]);
                    $('#JantaQtdRel').html(qtdEvento[3]);
                    $('#CeiaQtdRel').html(qtdEvento[3]);
                    var qdtGeral = parseInt(qtdEvento[0]) + parseInt(qtdEvento[1]) + parseInt(qtdEvento[2]) + parseInt(qtdEvento[3]) + parseInt(qtdEvento[3]);
                }
                $('#tabelaRegistro').html(qtdEvento[4]);
                $('#TotalQtdRel').html(qdtGeral);
            }
        });
    }

});


