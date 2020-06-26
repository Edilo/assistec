<?php

class ControleLogin {

    private $Dados;

    public function login() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['SendLogin'])):
            unset($this->Dados['SendLogin']);
            $Login = new ModelsLogin();
            $Login->logar($this->Dados);
            if(!$Login->getResultado()):
                $_SESSION['msg'] = $Login->getMsg();
            else:
                $this->Dados = $Login->getResultado();
                $_SESSION['ID'] = $this->Dados[0]['ID'];
                $_SESSION['NOME'] = $this->Dados[0]['NOME'];
                $_SESSION['LOGIN'] = $this->Dados[0]['LOGIN'];
                $UrlDestino = URL . 'controle-home/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $this->Dados = null;
        endif;

        $CarregarView = new ConfigView("login/login", $this->Dados);
        $CarregarView->renderizarlogin();
    }

    public function logout() {
        unset($_SESSION['ID'], $_SESSION['NOME'], $_SESSION['LOGIN']);
        $_SESSION['msg'] = "<p class = 'alert-success text-center mt-1'>Deslogado com sucesso!</p>";
        $UrlDestino = URL . 'controle-login/login';
        header("Location:$UrlDestino");
    }

}
