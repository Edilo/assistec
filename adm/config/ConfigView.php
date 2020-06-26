<?php

class ConfigView {

    private $Nome;
    private $Dados;
    private $Dados1;
    private $Dados2;
    private $Dados3;
    private $Dados4;
    private $Dados5;
    private $Dados6;
    private $Dados7;
    private $Dados8;
    private $Dados9;
    private $Dados10;
    private $Dados11;
    
    public function __construct($Nome, array $Dados = null,array $Dados1 = null,array $Dados2 = null, array $Dados3 = null, array $Dados4 = null, array $Dados5 = null, array $Dados6 = null, array $Dados7 = null, array $Dados8 = null, array $Dados9 = null, array $Dados10 = null, array $Dados11 = null ) {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
        $this->Dados1 = $Dados1;
        $this->Dados2 = $Dados2;
        $this->Dados3 = $Dados3;
        $this->Dados4 = $Dados4;
        $this->Dados5 = $Dados5;
        $this->Dados6 = $Dados6;
        $this->Dados7 = $Dados7;
        $this->Dados8 = $Dados8;
        $this->Dados9 = $Dados9;
        $this->Dados10 = $Dados10;
        $this->Dados11 = $Dados11;
    }

    public function renderizar() {
        include 'views/include/header.php';
        include 'views/include/menu.php';
            if (file_exists('views/' . $this->Nome . '.php')):
                include 'views/' . $this->Nome . '.php';
            else:
                echo "Erro ao carregar a VIEW: {$this->Nome}";
            endif;
        include 'views/include/footer.php';
    }
    
    public function renderizarImpressao() {
     
        if (file_exists('views/' . $this->Nome . '.php')):
            include 'views/' . $this->Nome . '.php';
        else:
            echo "Erro ao carregar a VIEW: {$this->Nome}";
        endif;
    }
    
 
    public function renderizarlogin() {
        if(file_exists('views/'. $this->Nome . '.php')):
            include 'views/'. $this->Nome . '.php';
        endif;
    }


    public function getdados() {
        return $this->Dados;
    }

}
