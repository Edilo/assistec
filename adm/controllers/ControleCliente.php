<?php

class ControleCliente
{

    private $Dados;
    private $UserId;

    public function index()
    {
        $CarregarView = new ConfigView("cliente/index", $this->Dados);
        $CarregarView->renderizar();
    }
}
