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
class ModelsUsuario {

	public $Resultado;

	public function usuarios(){
		$sql = "SELECT * FROM usuario";
		$consulta = new ModelsRead();
		$consulta->FullRead($sql);
		$this->Resultado = $consulta->getResult();
		return $this->Resultado;
	}

    public function saveuser($nome,$login,$senha) {
		date_default_timezone_set('America/Manaus');
		$date = date('Y-m-d H:i:s');
		
    	$Dados = [
    		'NOME' => strtoupper($nome),
    		'LOGIN' => $login,
			'SENHA' => md5($senha),
			'DATA' => $date
    	];
    	$create = new ModelsCreate();
    	$create->ExeCreate('usuario',$Dados);
    	if($create->getResult()):
    		echo '1';
    	else:
    		echo '2';
    	endif;
	}
	
	public function altusuario($id,$Dados){

		$update = new ModelsUpdate();
		$update->ExeUpdate('usuario',$Dados, 'WHERE ID = :ID','ID='.$id."");

		if($update->getResult()):
			echo '1';
		else:
			echo '2';
		endif;
	}

	public function desativausuario($id,$Dados){
		$update = new ModelsUpdate();
		$update->ExeUpdate('usuario',$Dados, 'WHERE ID = :ID','ID='.$id."");

		if($update->getResult()):
			echo '1';
		else:
			echo '2';
		endif;
	}
}