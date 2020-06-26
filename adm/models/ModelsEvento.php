<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelsEvento
 *
 * @author DTI
 */
class ModelsEvento {
    private $Dados;
    private $Resultado;
    
    function getResultado() {
        return $this->Resultado;
    }
    
    public function tipoEvento() {
        
        $sql = "SELECT * FROM evento WHERE STATUS = '1'";
        $read = new ModelsRead();
        $read->FullRead($sql);
        
        if($read->getResult()):
            $this->Resultado = $read->getResult();
            return $this->Resultado;
        endif;
    }
}
