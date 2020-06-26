<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleRelatorio
 *
 * @author DTI
 */
class ControleRelatorio {
    private $Dados;
    private $Dados1;
    private $Dados2;
    private $Dados3;
    private $Dados4;
    private $Dados5;
    private $Dados6;
    private $Dados7;
    private $UserId;
    
    public function gerarRelatorio() {
        $evento = filter_input(INPUT_POST, 'evento', FILTER_DEFAULT);
        $dtini = filter_input(INPUT_POST, 'dtini', FILTER_DEFAULT);
        $dtfin = filter_input(INPUT_POST, 'dtfin', FILTER_DEFAULT);
        
        $gerar = new ModelsRelatorio();
        $this->Dados = $gerar->gerarRelatorio($evento,$dtini,$dtfin);
        
    }
}
