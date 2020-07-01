<div class="row">
    <div class="col-sm-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>controle-home/index">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <p class="text-muted">
                    <b>Usuários cadastrados</b>
                    <span class="float-right badge badge-info" data-toggle="modal" data-target="#modalCadUser" style="cursor:pointer;">Novo usuário</span>
                </p>
            </div>
            <div class="card-body" style="height: 500px;overflow: scroll;">
                <table class="table table-hover rounded">
                    <thead class="bg-dark text-white font-weight-bold">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>LOGIN</th>
                        <th class="text-center">STATUS</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->Dados as $users) :
                            if ($users['STATUS'] === '1') :
                                $status = "<span class='badge badge-success'>Ativo</span>";
                            elseif ($users['STATUS'] === '2') :
                                $status = "<spna class='badge badge-warning'>Inativo</span>";
                            endif;
                        ?>
                            <tr>
                                <td>
                                    <span class="badge badge-warning">
                                        <?= $users['ID'] ?>
                                    </span>
                                </td>
                                <td><?= $users['NOME'] ?></td>
                                <td><?= $users['LOGIN'] ?></td>
                                <td class="text-center"><?= $status ?></td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $users['ID'] ?>">
                                        Editar
                                    </button>
                                </td>
                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $users['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar usuário</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-group">
                                                <label for="" class="label">Nome</label>
                                                <input type="text" id="nomeAlt<?= $users['ID'] ?>" class="form-control text-uppercase" value="<?= $users['NOME']; ?>" />
                                                <label for="" class="label">Login</label>
                                                <input type="text" id="loginAlt<?= $users['ID'] ?>" class="form-control" value="<?= $users['LOGIN'] ?>" />
                                                <label for="" class="label">Senha</label>
                                                <input type="password" id="senhaAlt<?= $users['ID'] ?>" class="form-control" />
                                                <input type="hidden" id="idAlt<?= $users['ID'] ?>" value="<?= $users['ID'] ?>" class="form-control" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <?php
                                            if ($users['STATUS'] === '1') :
                                            ?>
                                                <button type="button" class="btn btn-danger btnDesativaUser<?= $users['ID'] ?>" nf="2">Desativar</button>
                                            <?php
                                            else :
                                            ?>
                                                <button type="button" class="btn btn-success btnDesativaUser<?= $users['ID'] ?>" nf="1">Ativar</button>
                                            <?php
                                            endif; ?>
                                            <button type="button" class="btn btn-primary btnUpdateUser<?= $users['ID'] ?>">Salvar alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    if ("<?= $users['STATUS'] ?>" === '2') {
                                        $('#nomeAlt<?= $users['ID'] ?>').prop('disabled', true);
                                        $('#loginAlt<?= $users['ID'] ?>').prop('disabled', true);
                                        $('#senhaAlt<?= $users['ID'] ?>').prop('disabled', true);
                                        $(".btnUpdateUser<?= $users['ID'] ?>").prop('disabled', true);
                                    }
                                });
                                $(".btnDesativaUser<?= $users['ID'] ?>").click(function() {
                                    var val = $(".btnDesativaUser<?= $users['ID'] ?>").attr('nf');
                                    var id = $("#idAlt<?= $users['ID'] ?>").val();
                                    if (val === '1') {
                                        var msg = "Ativando";
                                    } else {
                                        var msg = "Desativando";
                                    }
                                    $.ajax({
                                        type: "POST",
                                        url: "http://192.168.100.140/assistCisWeb/adm/controle-usuario/desativausuario",
                                        data: {
                                            id: id,
                                            val: val
                                        },
                                        beforeSend: function() {
                                            $(".btnDesativaUser<?= $users['ID'] ?>").html(msg);
                                            $('.btnUpdateUser<?= $users['ID'] ?>').prop('disabled',true);
                                            $(".btnDesativaUser<?= $users['ID'] ?>").prop('disabled', true);
                                        },
                                        success: function(res) {
                                            if (res === '1') {
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else {
                                                alert('Não foi possivel ativar o usuário.!');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            }

                                        }
                                    });
                                });
                                $(".btnUpdateUser<?= $users['ID'] ?>").click(function() {
                                    var ID = $("#idAlt<?= $users['ID'] ?>").val();
                                    var NOME = $("#nomeAlt<?= $users['ID'] ?>").val();
                                    var LOGIN = $("#loginAlt<?= $users['ID'] ?>").val();
                                    var SENHA = $("#senhaAlt<?= $users['ID'] ?>").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "http://192.168.100.140/assistCisWeb/adm/controle-usuario/altusuario",
                                        data: {
                                            id: ID,
                                            nome: NOME,
                                            login: LOGIN,
                                            senha: SENHA
                                        },
                                        beforeSend: function() {

                                            $('.btnUpdateUser<?= $users['ID'] ?>').html("Salvando...");
                                            $('.btnUpdateUser<?= $users['ID'] ?>').prop('disabled',true);
                                            $(".btnDesativaUser<?= $users['ID'] ?>").prop('disabled', true);
                                            $('#nome').prop('disabled', true);
                                            $('#login').prop('disabled', true);
                                            $('#senha').prop('disabled', true);
                                        },
                                        success: function(res) {
                                            if (res === '1') {
                                                $('.btnUpdateUser<?= $users['ID'] ?>').html('Salvo');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else if (res === '2') {
                                                $('.btnUpdateUser<?= $users['ID'] ?>').html('Não foi possível salvar');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else {
                                                $('.btnUpdateUser<?= $users['ID'] ?>').html('Erro ao salvar...');
                                            }
                                        }
                                    });

                                });
                            </script>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalCadUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group">
                    <label for="" class="label">Nome</label>
                    <input type="text" id="novonome" class="form-control text-uppercase" />
                    <label for="" class="label">Login</label>
                    <input type="text" id="novologin" class="form-control" />
                    <label for="" class="label">Senha</label>
                    <input type="password" id="novasenha" class="form-control" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnCreateUser">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
<script>
    $(".btnCreateUser").click(function() {
        var NOME = $('#novonome').val();
        var LOGIN = $('#novologin').val();
        var SENHA = $('#novasenha').val();
        $.ajax({
            type: "POST",
            url: "http://192.168.100.140/assistCisWeb/adm/controle-usuario/cadusuario",
            data: {
                nome: NOME,
                login: LOGIN,
                senha: SENHA
            },
            beforeSend: function() {
                $('.btnCreateUser').html("Salvando...");
                $(".btnCreateUser").prop('disabled', true);
                $('#novonome').prop('disabled', true);
                $('#novologin').prop('disabled', true);
                $('#novasenha').prop('disabled', true);
            },
            success: function(res) {
                if (res === 'erro') {
                    alert('Existem campos vazios!');
                    $('.btnCreateUser').html('Salvar');
                    $('#novonome').prop('disabled', false);
                    $('#novologin').prop('disabled', false);
                    $('#novasenha').prop('disabled', false);
                } else if (res === '1') {
                    $('.btnCreateUser').html('Salvo');
                    setTimeout(function() {
                        var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 2000);
                } else if (res === '2') {
                    $('.btnCreateUser').html('Não foi possível salvar');
                    setTimeout(function() {
                        var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-usuario/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 2000);
                } else {
                    $('.btnCreateUser').html('Erro ao salvar...');
                }
            }
        });

    });
</script>