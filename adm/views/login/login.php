<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assistência técnica CIS</title>
    <!-- Favicon -->
    <link href="<?= URL ?>assets/image/cis-logopp.jpg" rel="icon" type="image/png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= URL ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= URL ?>assets/bootstrap/css/floating-labels.css" rel="stylesheet">

    <!-- CSS Files -->
  <link href="<?= URL ?>assets/argon/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-default">
    <div class="form-signin rounded border-dark bg-white">
        <form method="POST" action="">
            <div class="text-center mb-4">
                <img class="mb-4 rounded" src="<?= URL ?>assets/image/cis.jpg" alt="" width="110" height="100">
                <h1 class="h3 mb-3 font-weight-normal">CIS Eletrônica da Amazônia</h1>
                <p>Acesso ao Sistema de Assistência Técnica</p>
            </div>

            <div class="form-label-group">
                <input type="text" class="form-control" name="email" autofocus="on">
                <label for="inputEmail">Usuário</label>
            </div>

            <div class="form-label-group">
                <input type="password" class="form-control" name="password">
                <label for="inputPassword">Senha</label>
            </div>
            <input type="submit" class="btn btn-lg btn-info btn-block" value="Acessar" name="SendLogin">
        </form>
        <?php
        if (isset($_SESSION['msg'])) :
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        endif;
        ?>
        <p class="mt-5 mb-3 text-muted text-center">Desenvolvido pelo dapartamento de TI - 2020</p>
    </div>
</body>

</html>