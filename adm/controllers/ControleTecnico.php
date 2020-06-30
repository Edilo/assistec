<?php

class ControleTecnico
{

    private $Dados;
    private $UserId;

    public function index()
    {
        $CarregarView = new ConfigView("tecnico/index", $this->Dados);
        $CarregarView->renderizar();
    }
}
