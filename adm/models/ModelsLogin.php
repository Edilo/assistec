<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelsLogin
 *
 * @author paulocastelo
 */
class ModelsLogin
{

    private $Dados;
    private $Resultado;
    private $Msg;
    private $RowCount;

    function getResultado()
    {
        return $this->Resultado;
    }

    function getMsg()
    {
        return $this->Msg;
    }

    function getRowCount()
    {
        return $this->RowCount;
    }

    public function logar(array $Dados)
    {
        $this->Dados = $Dados;
        $this->validar();
        if ($this->Resultado) :
            $sql = "select * from usuario where LOGIN = '" . $this->Dados['email'] . "' and SENHA = '" . $this->Dados['password'] . "' AND STATUS = 1";
            $Listar = new ModelsRead();
            $Listar->fullread($sql);
            $nlinhas = $Listar->getRowCount();
            if ($nlinhas > 0) :
                $this->Resultado = $Listar->getResult();
                $this->Msg = "<p class = 'alert-danger text-center mt-1 rounded'>Dados não conferem!</p>";
            else :
                $this->Resultado = false;
                $this->Msg = "<p class = 'alert-danger text-center mt-1 rounded'>Dados não conferem!</p>";
            endif;
        endif;
    }

    public function validar()
    {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);

        if (in_array('', $this->Dados)) :
            $this->Dados['password'] = md5($this->Dados['password']);
            $this->Resultado = false;
            $this->Msg = "<p class = 'alert-danger text-center mt-1 rounded'>Dados não conferem!</p>";
        else :
            $this->Dados['password'] = md5($this->Dados['password']);
            $this->Resultado = true;

        endif;
    }

    public function logacesso($iduser, $data)
    {

        $Dados = [
            'acsiduser' => $iduser,
            'acsdtini'  => $data
        ];

        $creatlog = new ModelsCreate();
        $creatlog->ExeCreate('tbllogacesso', $Dados);
    }

    public function logoffacesso($iduser, $data)
    {

        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        $Dados = [
            'acsdtfin' => $date
        ];

        $update = new ModelsUpdate();
        $update->ExeUpdate('tbllogacesso', $Dados, 'WHERE acsiduser = :iduser AND acsdtini = :dtini', 'iduser=' . $iduser . '&dtini=' . $data . '');
    }
}
