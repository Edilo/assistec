<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelsEstoque
 *
 * @author EdiloSousa
 */
class ModelsCliente {

	public $Resultado;

	public function clientes(){
		$sql = "SELECT * FROM cliente";
		$consulta = new ModelsRead();
		$consulta->FullRead($sql);
		$this->Resultado = $consulta->getResult();
		return $this->Resultado;
    }
}