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
                <p class="text-primary">
                    <b>Usuários cadastrados</b>
                </p>
            </div>
            <div class="card-body" style="height: 500px;overflow: scroll;">
                <table class="table table-hover">
                    <thead class="bg-dark text-white font-weight-bold rounded">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>LOGIN</th>
                        <th>STATUS</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->Dados as $users) :
                            if ($users['STATUS'] === '1') :
                                $status = "Ativo";
                            elseif ($users['STATUS'] === '2') :
                                $status = "Desativo";
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
                                <td><?= $status ?></td>
                                <td>
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
                                                <input type="text" id="nome" class="form-control" value="<?= $users['NOME']; ?>" />
                                                <label for="" class="label">Login</label>
                                                <input type="text" id="login" class="form-control" value="<?= $users['LOGIN'] ?>" />
                                                <label for="" class="label">Senha</label>
                                                <input type="text" id="senha" class="form-control" />
                                                <input type="hidden" id="id" value="<?= $users['ID'] ?>" class="form-control" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btnUpdateUser<?= $users['ID'] ?>">Salvar alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
                            <script>
                                $(".btnUpdateUser<?= $users['ID'] ?>").click(function() {
                                    var ID = $('#id').val();
                                    var NOME = $('#nome').val();
                                    var LOGIN = $('#login').val();
                                    var SENHA = $('#senha').val();
                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost/assistCisWeb/adm/controle-usuario/altusuario",
                                        data: {
                                            id: ID,
                                            nome: NOME,
                                            login: LOGIN,
                                            senha: SENHA
                                        },
                                        beforeSend: function() {
                                            $('.btnUpdateUser<?= $users['ID'] ?>').html('Salvando...');
                                            $('#nome').prop('disabled',true);
                                            $('#login').prop('disabled',true);
                                            $('#senha').prop('disabled',true);
                                        },
                                        success: function(res) {
                                            if (res === '1') {
                                                $('.btnUpdateUser<?= $users['ID'] ?>').html('Salvo');
                                                setTimeout(function() {
                                                    var novaURL = "http://localhost/assistCisWeb/adm/controle-usuario/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else if (res === '2') {
                                                $('.btnUpdateUser<?= $users['ID'] ?>').html('Não foi possível salvar');
                                                setTimeout(function() {
                                                    var novaURL = "http://localhost/assistCisWeb/adm/controle-usuario/index";
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