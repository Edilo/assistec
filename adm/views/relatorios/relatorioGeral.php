
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?= URL ?>controle-home/index">Relatório Geral</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?= URL ?>assets/image/cis-logopp.jpg">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['NOME'] ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem vindo!</h6>
                        </div>
                        <a href="" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Perfil</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-white">Filtro de busca de relatório</h5>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Refeição</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <select class="form-control" id="evento">
                                                <option value="">SELECIONE</option>
                                                <?php
                                                foreach ($this->Dados as $evento):
                                                ?>
                                                    <option value="<?= $evento['ID'] ?>" ><?= $evento['DESCRICAO'] ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </span>
                                    </div>

                                    <div class="col-sm-4">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Data inicial</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <input type="date" id="dtini" class="form-control">
                                        </span>
                                    </div>

                                    <div class="col-sm-4">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Data final</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <input type="date" id="dtfin" class="form-control">
                                        </span>
                                    </div>

                                    <div class="col-sm-1 text-center">
                                        <h5 class="card-title text-uppercase text-muted mb-0">&nbsp;</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <button class="btn btn-info btn-md" id="btnSearchRelGer">Buscar</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Café
                                <span class="h2 font-weight-bold ml-4" id="CafeQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Almoço
                                <span class="h2 font-weight-bold ml-4" id="AlmocoQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Lanche
                                <span class="h2 font-weight-bold ml-4" id="LancheQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Janta
                                <span class="h2 font-weight-bold ml-4" id="JantaQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Ceia
                                <span class="h2 font-weight-bold ml-4" id="CeiaQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                Total
                                <span class="h2 font-weight-bold ml-4" id="TotalQtdRel">
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-sm-12">
                        <div class="card bg-default shadow mt-3">
                            <div class="card-header bg-transparent border-0">
                                <h4 class="text-white mb-0">Funcionários registrados</h4>
                            </div>
                            <div class="table-responsive">
                                <div style="overflow-style: scrollbar; height: 317px;">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-dark table-flush">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Funcionário</th>
                                                <th scope="col">Refeição</th>
                                                <th scope="col">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabelaRegistro">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= URL ?>assets/js/jsSearchRel.js"></script>