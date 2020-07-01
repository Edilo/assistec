<?php

class ControleCliente
{

    private $Dados;
    private $UserId;

    public function index()
    {
        $listarCliente = new ModelsCliente();
        $this->Dados = $listarCliente->clientes();
        $CarregarView = new ConfigView("cliente/index", $this->Dados);
        $CarregarView->renderizar();
    }

}
