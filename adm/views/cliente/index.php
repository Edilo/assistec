<div class="row">
    <div class="col-sm-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>controle-home/index">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <p class="text-muted">
                    <b>Clientes cadastrados</b>
                    <span class="float-right badge badge-info" data-toggle="modal" data-target="#modalCadCliente" style="cursor:pointer;">Novo cliente</span>
                </p>
            </div>
            <div class="card-body" style="height: 500px;overflow: scroll;">
                <table class="table table-hover rounded">
                    <thead class="bg-dark text-white font-weight-bold">
                        <th>ID</th>
                        <th>EMPRESA</th>
                        <th>TELEFONE</th>
                        <th>E-MAIL</th>
                        <th class="text-center">STATUS</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->Dados as $clientes) :
                            if ($clientes['STATUS'] === '1') :
                                $status = "<span class='badge badge-success'>Ativo</span>";
                            elseif ($clientes['STATUS'] === '2') :
                                $status = "<spna class='badge badge-warning'>Inativo</span>";
                            endif;
                        ?>
                            <tr>
                                <td>
                                    <span class="badge badge-warning">
                                        <?= $clientes['ID'] ?>
                                    </span>
                                </td>
                                <td><?= $clientes['EMPRESA'] ?></td>
                                <td><?= $clientes['TELEFONE'] ?></td>
                                <td><?= $clientes['EMAIL'] ?></td>
                                <td class="text-center"><?= $status ?></td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $clientes['ID'] ?>">
                                        Editar
                                    </button>
                                </td>
                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $clientes['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-group">
                                                <label for="" class="label">Empresa</label>
                                                <input type="text" id="empresaAlt<?= $clientes['ID'] ?>" class="form-control text-uppercase" value="<?= $clientes['EMPRESA']; ?>" />
                                                <label for="" class="label">Telefone</label>
                                                <input type="text" id="telefoneAlt<?= $clientes['ID'] ?>" class="form-control" value="<?= $clientes['TELEFONE'] ?>" />
                                                <label for="" class="label">Email</label>
                                                <input type="text" id="emailAlt<?= $clientes['ID'] ?>" class="form-control" value="<?= $clientes['EMAIL'] ?>" />
                                                <label for="" class="label">Endereço</label>
                                                <input type="text" id="enderecoAlt<?= $clientes['ID'] ?>" class="form-control" value="<?= $clientes['ENDERECO'] ?>" />
                                                <label for="" class="label">Observações</label>
                                                <textarea type="text" id="observacoesAlt<?= $clientes['ID'] ?>" class="form-control"><?= $clientes['OBSERVACOES'] ?></textarea>
                                                <input type="hidden" id="idAlt<?= $clientes['ID'] ?>" value="<?= $clientes['ID'] ?>" class="form-control" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <?php
                                            if ($clientes['STATUS'] === '1') :
                                            ?>
                                                <button type="button" class="btn btn-danger btnDesativaCliente<?= $clientes['ID'] ?>" nf="2">Desativar</button>
                                            <?php
                                            else :
                                            ?>
                                                <button type="button" class="btn btn-success btnDesativaCliente<?= $clientes['ID'] ?>" nf="1">Ativar</button>
                                            <?php
                                            endif; ?>
                                            <button type="button" class="btn btn-primary btnUpdateCliente<?= $clientes['ID'] ?>">Salvar alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    if ("<?= $clientes['STATUS'] ?>" === '2') {
                                        $('#empresaAlt<?= $clientes['ID'] ?>').prop('disabled', true);
                                        $('#telefoneAlt<?= $clientes['ID'] ?>').prop('disabled', true);
                                        $('#emailAlt<?= $clientes['ID'] ?>').prop('disabled', true);
                                        $('#enderecoAlt<?= $clientes['ID'] ?>').prop('disabled', true);
                                        $('#observacoesAlt<?= $clientes['ID'] ?>').prop('disabled', true);
                                        $(".btnUpdateCliente<?= $clientes['ID'] ?>").prop('disabled', true);
                                    }
                                });
                                $(".btnDesativaCliente<?= $clientes['ID'] ?>").click(function() {
                                    var val = $(".btnDesativaCliente<?= $clientes['ID'] ?>").attr('nf');
                                    var id = $("#idAlt<?= $clientes['ID'] ?>").val();
                                    if (val === '1') {
                                        var msg = "Ativando";
                                    } else {
                                        var msg = "Desativando";
                                    }
                                    $.ajax({
                                        type: "POST",
                                        url: "http://192.168.100.140/assistCisWeb/adm/controle-cliente/desativacliente",
                                        data: {
                                            id: id,
                                            val: val
                                        },
                                        beforeSend: function() {
                                            $(".btnDesativaCliente<?= $clientes['ID'] ?>").html(msg);
                                            $('.btnUpdateCliente<?= $clientes['ID'] ?>').prop('disabled', true);
                                            $(".btnDesativaCliente<?= $clientes['ID'] ?>").prop('disabled', true);
                                        },
                                        success: function(res) {
                                            if (res === '1') {
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else {
                                                alert('Não foi possivel ativar o cliente.!');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            }

                                        }
                                    });
                                });
                                $(".btnUpdateCliente<?= $clientes['ID'] ?>").click(function() {
                                    var ID = $("#idAlt<?= $clientes['ID'] ?>").val();
                                    var EMPRESA = $("#empresaAlt<?= $clientes['ID'] ?>").val();
                                    var TELEFONE = $("#telefoneAlt<?= $clientes['ID'] ?>").val();
                                    var ENDERECO = $("#enderecoAlt<?= $clientes['ID'] ?>").val();
                                    var EMAIL = $("#emailAlt<?= $clientes['ID'] ?>").val();
                                    var OBSERVACOES = $("#observacoesAlt<?= $clientes['ID'] ?>").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "http://192.168.100.140/assistCisWeb/adm/controle-usuario/altusuario",
                                        data: {
                                            id: ID,
                                            empresa: EMPRESA,
                                            telefone: TELEFONE,
                                            endereco: ENDERECO,
                                            email: EMAIL,
                                            observacoes: OBSERVACOES
                                        },
                                        beforeSend: function() {
                                            $('.btnUpdateCliente<?= $clientes['ID'] ?>').html("Salvando...");
                                            $('.btnUpdateCliente<?= $clientes['ID'] ?>').prop('disabled', true);
                                            $(".btnDesativaCliente<?= $clientes['ID'] ?>").prop('disabled', true);
                                            $("#empresaAlt<?= $clientes['ID'] ?>").prop('disabled', true);
                                            $("#telefoneAlt<?= $clientes['ID'] ?>").prop('disabled', true);
                                            $("#enderecoAlt<?= $clientes['ID'] ?>").prop('disabled', true);
                                            $("#emailAlt<?= $clientes['ID'] ?>").prop('disabled', true);
                                            $("#observacoesAlt<?= $clientes['ID'] ?>").prop('disabled', true);
                                        },
                                        success: function(res) {
                                            if (res === '1') {
                                                $('.btnUpdateCliente<?= $clientes['ID'] ?>').html('Salvo');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else if (res === '2') {
                                                $('.btnUpdateCliente<?= $clientes['ID'] ?>').html('Não foi possível salvar');
                                                setTimeout(function() {
                                                    var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                                                    $(window.document.location).attr('href', novaURL);
                                                }, 2000);
                                            } else {
                                                $('.btnUpdateCliente<?= $clientes['ID'] ?>').html('Erro ao salvar...');
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
<div class="modal fade" id="modalCadCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group">
                    <label for="" class="label">Empresa</label>
                    <input type="text" id="novoempresa" class="form-control text-uppercase" />
                    <label for="" class="label">Telefone</label>
                    <input type="text" id="novotelefone" class="form-control" />
                    <label for="" class="label">Email</label>
                    <input type="text" id="novoemail" class="form-control" />
                    <label for="" class="label">Endereço</label>
                    <input type="text" id="novoendereco" class="form-control" />
                    <label for="" class="label">Observações</label>
                    <textarea type="text" id="novoobservacoes" class="form-control"></textarea>

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
        var EMPRESA = $("#novoempresa").val();
        var TELEFONE = $("#novotelefone").val();
        var ENDERECO = $("#novoendereco").val();
        var EMAIL = $("#novoemail").val();
        var OBSERVACOES = $("#novoobservacoes").val();

        $.ajax({
            type: "POST",
            url: "http://192.168.100.140/assistCisWeb/adm/controle-cliente/cadcliente",
            data: {
                empresa: EMPRESA,
                telefone: TELEFONE,
                endereco: ENDERECO,
                email: EMAIL,
                observacoes: OBSERVACOES
            },
            beforeSend: function() {
                $('.btnCreateCliente').html("Salvando...");
                $(".btnCreateCliente").prop('disabled', true);
                $('#novoempresa').prop('disabled', true);
                $('#novotelefone').prop('disabled', true);
                $('#novoendereco').prop('disabled', true);
                $('#novoemail').prop('disabled', true);
                $('#novoobservacoes').prop('disabled', true);
            },
            success: function(res) {
                if (res === 'erro') {
                    alert('Existem campos vazios!');
                    $('.btnCreateCliente').html('Salvar');
                    $('#novoempresa').prop('disabled', false);
                    $('#novotelefone').prop('disabled', false);
                    $('#novoendereco').prop('disabled', false);
                    $('#novoemail').prop('disabled', false);
                    $('#novoobservacoes').prop('disabled', false);
                } else if (res === '1') {
                    $('.btnCreateCliente').html('Salvo');
                    setTimeout(function() {
                        var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 2000);
                } else if (res === '2') {
                    $('.btnCreateCliente').html('Não foi possível salvar');
                    setTimeout(function() {
                        var novaURL = "http://192.168.100.140/assistCisWeb/adm/controle-cliente/index";
                        $(window.document.location).attr('href', novaURL);
                    }, 2000);
                } else {
                    $('.btnCreateCliente').html('Erro ao salvar...');
                }
            }
        });

    });
</script>