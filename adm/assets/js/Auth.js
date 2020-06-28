

$('#accessAuth').click(function () {
    var email = $("#email").val();
    var pass = $('#password').val();
    
    $.ajax({
        type: "POST",
        url: "http://localhost//CisBioWeb/adm/controle-login/auth",
        data: {
            email:email,
            password:pass
        },
        beforeSend: function () {

        },
        success: function (resultado) {
            alert(resultado);
        }
    });

});



