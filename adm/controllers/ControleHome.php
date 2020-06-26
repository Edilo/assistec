<?php

class ControleHome {

    private $Dados;
    private $Dados1;
    private $Dados2;
    private $Dados3;
    private $Dados4;
    private $Dados5;
    private $Dados6;
    private $Dados7;
    private $UserId;

    public function index() {
        $CarregarView = new ConfigView("home/home");
        $CarregarView->renderizar();
    }
    
    public function relatorios(){
        
        $evento = new ModelsEvento();
        $this->Dados = $evento->tipoEvento();
        
        $relView = new ConfigView("relatorios/relatorioGeral",$this->Dados);
        $relView->renderizar();
    }
    
    public function gerarDashboardDinamico(){
        
        $date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
        
        $qtdCafe = new ModelsEstatisticaRefeicao();
        $qtdCafe->gerarDashboardDinamicoCafe($date);
        
        $qtdAlmoco = new ModelsEstatisticaRefeicao();
        $qtdAlmoco->gerarDashboardDinamicoAlmoco($date);
        
        $qtdLanche = new ModelsEstatisticaRefeicao();
        $qtdLanche->gerarDashboardDinamicoLanche($date);
        
        
        
        $qtdCafeFuncionario = new ModelsEstatisticaRefeicao();
        $qtdCafeFuncionario->listarFuncionarioRegistroCafeDinamico($date);
        
        $qtdAlmocoFuncionario = new ModelsEstatisticaRefeicao();
        $qtdAlmocoFuncionario->listarFuncionarioRegistroAlmocoDinamico($date);
        
        $qtdLancheFuncionario = new ModelsEstatisticaRefeicao();
        $qtdLancheFuncionario->listarFuncionarioRegistroLancheDinamico($date);
        
        
    }
}
