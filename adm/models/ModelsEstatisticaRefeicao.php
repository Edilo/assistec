<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelsEstatisticaRefeicao{
    
    private $Dados;
    private $Resultado;
    
    function getResultado() {
        return $this->Resultado;
    }
    
    
    public function estatisticaCafe() {
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '8' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE()";
        $estCafe = new ModelsRead();
        $estCafe->FullRead($sql);
        
        if($estCafe->getResult()):
            $this->Resultado = $estCafe->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function estatisticaAlmoco() {
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '9' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE()";
        $estAlmoco = new ModelsRead();
        $estAlmoco->FullRead($sql);
        
        if($estAlmoco->getResult()):
            $this->Resultado = $estAlmoco->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function estatisticaLanche() {
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '10' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE()";
        $estLanche = new ModelsRead();
        $estLanche->FullRead($sql);
        
        if($estLanche->getResult()):
            $this->Resultado = $estLanche->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function estatisticaJanta() {
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '11' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE()";
        $estJanta = new ModelsRead();
        $estJanta->FullRead($sql);
        
        if($estJanta->getResult()):
            $this->Resultado = $estJanta->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function estatisticaTodosRef() {
        $sql = "SELECT COUNT(*) as qtd,ev.DESCRICAO FROM refeicao ref INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO GROUP BY DESCRICAO ORDER BY ev.ID ASC";
        $estTodos = new ModelsRead();
        $estTodos->FullRead($sql);
        
        if($estTodos->getResult()):
            $this->Resultado = $estTodos->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function listarFuncionarioRegistroCafe() {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA,fun.FOTO as foto FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE() AND ev.ID = '8' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncReg = new ModelsRead();
        $lstFuncReg->FullRead($sql);
        
        if($lstFuncReg->getResult()):
            $this->Resultado = $lstFuncReg->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function listarFuncionarioRegistroAlmoco() {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA,fun.FOTO as foto FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE() AND ev.ID = '9' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncReg = new ModelsRead();
        $lstFuncReg->FullRead($sql);
        
        if($lstFuncReg->getResult()):
            $this->Resultado = $lstFuncReg->getResult();
            return $this->Resultado;
        endif;
    }
    
    public function listarFuncionarioRegistroLanche() {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = CURDATE() AND ev.ID = '10' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncReg = new ModelsRead();
        $lstFuncReg->FullRead($sql);
        
        if($lstFuncReg->getResult()):
            $this->Resultado = $lstFuncReg->getResult();
            return $this->Resultado;
        endif;
    }
    
    
    public function listarQtdGeralRefReg() {
        $sql = "SELECT COUNT(*) as qtdGeral, ev.DESCRICAO FROM refeicao ref "
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 GROUP BY ev.ID ORDER BY ev.ID ASC";
        $lstQtdGeral = new ModelsRead();
        $lstQtdGeral->FullRead($sql);
        
        if($lstQtdGeral->getResult()):
            $this->Resultado = $lstQtdGeral->getResult();
            return $this->Resultado;
        endif;
        
    }
    
    public function graphGeralContinuos() {
        $sql = "SELECT COUNT(*) as QTD, EXTRACT(MONTH FROM `HORARIO_ENTRADA`) as MES, "
                . "EXTRACT(YEAR FROM `HORARIO_ENTRADA`) as ANO "
                . "FROM `refeicao` WHERE EXTRACT(YEAR FROM `HORARIO_ENTRADA`) = '2019' GROUP BY MES ORDER BY MES ASC;";
        $lstGraphGeral = new ModelsRead();
        $lstGraphGeral->FullRead($sql);
        
        if($lstGraphGeral->getResult()):
            $this->Resultado = $lstGraphGeral->getResult();
            return $this->Resultado;
        endif;
        
    }
    
    
    //DINAMICO
    
    public function gerarDashboardDinamicoCafe($date){
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '8' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}'";
        $estCafe = new ModelsRead();
        $estCafe->FullRead($sql);
        
        if($estCafe->getResult()):
            foreach($estCafe->getResult() as $qtdcaFe);
                echo $qtdcaFe['qtd'].'+';
        endif;
        
    }
    
    
    public function gerarDashboardDinamicoAlmoco($date){
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '9' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}'";
        $estAlmoco = new ModelsRead();
        $estAlmoco->FullRead($sql);
        
        if($estAlmoco->getResult()):
            foreach($estAlmoco->getResult() as $qtdalmoco);
                echo $qtdalmoco['qtd'].'+';
        endif;
        
    }
    
    public function gerarDashboardDinamicoLanche($date){
        $sql = "SELECT COUNT(*) as qtd FROM refeicao WHERE FK_HORARIO_REFEICAO = '10' AND DATE_FORMAT(HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}'";
        $estLanche = new ModelsRead();
        $estLanche->FullRead($sql);
        
        if($estLanche->getResult()):
            foreach($estLanche->getResult() as $qtdlanche);
                echo $qtdlanche['qtd'].'+';
        endif;
        
    }
    
    
    public function listarFuncionarioRegistroCafeDinamico($date) {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}' AND ev.ID = '8' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncRegCafeDinamico = new ModelsRead();
        $lstFuncRegCafeDinamico->FullRead($sql);
        
        if($lstFuncRegCafeDinamico->getResult()):
            foreach ($lstFuncRegCafeDinamico->getResult() as $relDinamicoCafe):
            $date = new DateTime($relDinamicoCafe['HORARIO_ENTRADA']);
                ?>
                <tr>
                    <td><?=$relDinamicoCafe['NOME']?></td>
                    <td><?=$date->format('H:i:s')?></td>
                </tr>    
                <?php
            endforeach;
            echo '<tr></tr>+';
        endif;
    }
    
    
    public function listarFuncionarioRegistroAlmocoDinamico($date) {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}' AND ev.ID = '9' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncRegCafeDinamico = new ModelsRead();
        $lstFuncRegCafeDinamico->FullRead($sql);
        
        if($lstFuncRegCafeDinamico->getResult()):
            foreach ($lstFuncRegCafeDinamico->getResult() as $relDinamicoCafe):
            $date = new DateTime($relDinamicoCafe['HORARIO_ENTRADA']);
                ?>
                <tr>
                    <td><?=$relDinamicoCafe['NOME']?></td>
                    <td><?=$date->format('H:i:s')?></td>
                </tr>    
                <?php
            endforeach;
            echo '<tr></tr>+';
        endif;
    }
    
    
    public function listarFuncionarioRegistroLancheDinamico($date) {
        $sql = "SELECT ev.DESCRICAO,fun.ID as IDFUN,fun.NOME,ref.HORARIO_ENTRADA FROM refeicao ref "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO"
                . " WHERE ref.STATUS = 1 AND DATE_FORMAT(ref.HORARIO_ENTRADA, '%Y-%m-%d') = '{$date}' AND ev.ID = '10' ORDER BY ref.HORARIO_ENTRADA ASC";
        $lstFuncRegLancheDinamico = new ModelsRead();
        $lstFuncRegLancheDinamico->FullRead($sql);
        
        if($lstFuncRegLancheDinamico->getResult()):
            foreach ($lstFuncRegLancheDinamico->getResult() as $relDinamicoLanche):
            $date = new DateTime($relDinamicoLanche['HORARIO_ENTRADA']);
                ?>
                <tr>
                    <td><?=$relDinamicoLanche['NOME']?></td>
                    <td><?=$date->format('H:i:s')?></td>
                </tr>    
                <?php
            endforeach;
        endif;
    }
    
    
}
