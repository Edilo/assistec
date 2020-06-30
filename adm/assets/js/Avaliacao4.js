
function avaliar(id, status) {
    if (status === 'Finalizado') {

        var ocavaliacao = $("input[name='estrela" + id + "']:checked").val();
        if (ocavaliacao == '') {
            alert('Valor mínimo para avaliação é de 1 estrela!');
        } else {

            $.ajax({
                type: "POST",
                url: "http://192.168.100.140/OSproject/adm/controle-ocorrencia/avaliarOcorrencia",
                data: {
                    occod: id,
                    ocavaliacao: ocavaliacao
                },

                beforeSend: function () {
                    $('#modal-grupo').modal('hide');
                    $('#h3-modal').html('Salvando avaliação');

                    $('#mode').modal('show');
                },

                success: function (resultado) {
                    if (resultado !== "") {
                        $('#mode').modal('hide');

                        //alert("PPPPPPPP");
                        $('#strong-msg').html('Avalição registrada com sucesso!');
                        $('#msg').show();

                        setTimeout(function () {

                            $('#msg').fadeOut(4000);
                            var novaURL = "http://192.168.100.140/OSproject/adm/controle-ocorrencia/index";
                            $(window.document.location).attr('href', novaURL);
                        }, 1000);
                        console.log(resultado);
                        console.log(resultado);
                    } else {
                        console.log("error retorno vazio!");
                    }
                }
            });
        }
    } else if (status === 'Recusado') {
        alert('Não é possivel avaliar. Processo foi Recusado');

        var novaURL = "http://192.168.100.140/OSproject/adm/controle-ocorrencia/index";
        $(window.document.location).attr('href', novaURL);
    } else if (status === 'Pendente') {
        alert('Não é possivel avaliar. Processo está Pendente');

        var novaURL = "http://192.168.100.140/OSproject/adm/controle-ocorrencia/index";
        $(window.document.location).attr('href', novaURL);
    } else if (status === 'Aberto') {
        alert('Não é possivel avaliar. Processo está Aberto');

        var novaURL = "http://192.168.100.140/OSproject/adm/controle-ocorrencia/index";
        $(window.document.location).attr('href', novaURL);
    } else {

        var novaURL = "http://192.168.100.140/OSproject/adm/controle-ocorrencia/index";
        $(window.document.location).attr('href', novaURL);
    }

    return false;
}