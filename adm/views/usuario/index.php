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
            <div class="card-header bg-red">
                <p class="text-white">
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
                                                <input type="text" class="form-control" value="<?=$users['NOME'];?>" />
                                                <label for="" class="label">Login</label>
                                                <input type="text" class="form-control" />
                                                <label for="" class="label">Senha</label>
                                                <input type="text" class="form-control" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Salvar alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>