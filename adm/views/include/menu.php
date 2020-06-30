<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
  <!-- Nav items -->
  <ul class="navbar-nav">
    <li class="nav-item  active">
      <a class=" nav-link active " href="<?= URL ?>controle-home/index"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
      </a>
    </li>

    <span class=" nav-link menuCad" style="cursor: pointer;"> <i class="ni ni-bullet-list-67 text-red"></i> Cadastros
    </span>
    <ul class="navbar-nav ml-3 submenucad" style="display: none;">
      <li class="nav-item">
        <a class=" nav-link " href="<?= URL ?>controle-usuario/index"> <i class="ni ni-circle-08 text-primary"></i> Usuário
        </a>
      </li>
      <li class="nav-item">
        <a class=" nav-link " href="<?= URL ?>controle-cliente/index"> <i class="ni ni-single-02 text-primary"></i> Cliente
        </a>
      </li>
      <li class="nav-item">
        <a class=" nav-link " href="<?= URL ?>controle-tecnico/index"> <i class="ni ni-settings text-primary"></i> Técnico
        </a>
      </li>
    </ul>
    </li>
    <!-- FIM MENU CADASTROS -->

    <li class="nav-item">
      <a class=" nav-link " href="<?= URL ?>controle-home/relatorios"> <i class="ni ni-archive-2 text-success"></i> Atendimento
      </a>
    </li>
    <li class="nav-item">
      <a class=" nav-link " href="<?= URL ?>controle-home/relatorios"> <i class="ni ni-collection text-yellow"></i> Relatórios
      </a>
    </li>
    <li class="nav-item">
      <a class=" nav-link " href="<?= URL ?>controle-login/logout"> <i class="ni ni-button-power text-primary"></i> Logout
      </a>
    </li>
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  </ul>
</div>
</div>
</div>
</nav>


<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Page content -->
  <div class="container-fluid mt-4">