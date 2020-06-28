<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleEstoque
 *
 * @author EdiloSousa
 */
class ControleUsuario {

    private $Dados;
    private $UserId;

    public function index(){
        $users = new ModelsUsuario();
        $this->Dados = $users->usuarios();
        $CarregarView = new ConfigView("usuario/index",$this->Dados);
        $CarregarView->renderizar();
    }

    public function cadusuario(){
    	$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
     	$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
     	$nivel = filter_input(INPUT_POST, 'nivel', FILTER_DEFAULT);	

        $saveuser = new ModelsUsuario();
        $saveuser->saveuser($nome,$login,$senha,$nivel);


    }

    public function altusuario(){
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

        if($senha === ''):
            $Dados = [
                'NOME' => $nome,
                'LOGIN' => $login
            ];
        else:
            $Dados = [
                'NOME' => $nome,
                'LOGIN' => $login,
                'SENHA' => md5($senha)
            ];
        endif;

        $altusuario = new ModelsUsuario();
        $altusuario->altusuario($id,$Dados);
    }
}