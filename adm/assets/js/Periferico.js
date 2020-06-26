//Formulario de cadastro de perifericos, acionando um AJAX para executar 
$('#form-cad-per').submit(function () {
    var URL = $('#url').val();
    var descricao = $('#descricao').val().trim();
    var codhardware = $('#codhardware').val();
    var obs = $('#obs').val();
    
    if (descricao !== ' ' || descricao !== NULL) {
        $.ajax({
            type: "POST",
            url: "" + URL + "controle-periferico/cadastrar",
            data: {
                descricao: descricao,
                codhardware: codhardware,
                obs: obs
            },
            beforeSend: function (response) {
                $('.div-load-cad-per').show();
            },
            success: function (response) {
                if (response === '1') {
                    $('.div-load-cad-per').hide();
                    $('#form-cad-per').hide();
                    setTimeout(function () {
                        $('.alert-cad-per').show();
                    }, 100);
                    setTimeout(function () {
                        var novaURL = "" + URL + "controle-periferico/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 1500);

                } else {
                    setTimeout(function () {
                        alert('Falha ao cadastrar');
                        var novaURL = "" + URL + "controle-periferico/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 100);

                }

            }
        });

    }
    return false;

});
