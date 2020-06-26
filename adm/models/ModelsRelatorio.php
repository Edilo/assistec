<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelsRelatorio
 *
 * @author DTI
 */
class ModelsRelatorio {

    private $Dados;
    private $Resultado;

    function getResultado() {
        return $this->Resultado;
    }

    public function gerarRelatorio($ev, $dti, $dtf) {

        //CAFE
        $sqlqtdCafe = "SELECT COUNT(*) as qtd FROM refeicao ref"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO "
                . "WHERE (HORARIO_ENTRADA > '{$dti} 00:00:00' AND HORARIO_ENTRADA < '{$dtf} 23:59:59') AND ref.FK_HORARIO_REFEICAO = '8'";

        $readqtdCafe = new ModelsRead();
        $readqtdCafe->FullRead($sqlqtdCafe);
        if($readqtdCafe->getResult()):
            foreach($readqtdCafe->getResult() as $qtdCafe);
            echo $qtdCafe['qtd']."+";
        endif;
        
        $sqlqtdAlmoco = "SELECT COUNT(*) as qtd FROM refeicao ref"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO "
                . "WHERE (HORARIO_ENTRADA > '{$dti} 00:00:00' AND HORARIO_ENTRADA < '{$dtf} 23:59:59') AND ref.FK_HORARIO_REFEICAO = '9'";

        $readqtdAlmoco = new ModelsRead();
        $readqtdAlmoco->FullRead($sqlqtdAlmoco);
        if($readqtdAlmoco->getResult()):
            foreach($readqtdAlmoco->getResult() as $qtdAlmoco);
            echo $qtdAlmoco['qtd']."+";
        endif;
        
        $sqlqtdLanche = "SELECT COUNT(*) as qtd FROM refeicao ref"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO "
                . "WHERE (HORARIO_ENTRADA > '{$dti} 00:00:00' AND HORARIO_ENTRADA < '{$dtf} 23:59:59') AND ref.FK_HORARIO_REFEICAO = '10'";

        $readqtdLanche = new ModelsRead();
        $readqtdLanche->FullRead($sqlqtdLanche);
        if($readqtdLanche->getResult()):
            foreach($readqtdLanche->getResult() as $qtdLanche);
            echo $qtdLanche['qtd']."+";
        endif;
        
        $sqlqtdJanta = "SELECT COUNT(*) as qtd FROM refeicao ref"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO "
                . "WHERE (HORARIO_ENTRADA > '{$dti} 00:00:00' AND HORARIO_ENTRADA < '{$dtf} 23:59:59') AND ref.FK_HORARIO_REFEICAO = '12'";

        $readqtdJanta = new ModelsRead();
        $readqtdJanta->FullRead($sqlqtdJanta);
        if($readqtdJanta->getResult()):
            foreach($readqtdJanta->getResult() as $qtdJanta);
            echo $qtdJanta['qtd']."+";
        endif;
        
        
        //ALMOÇO
        $sql = "SELECT fun.NOME as nome, ev.DESCRICAO as refeicao, ref.HORARIO_ENTRADA as hora FROM refeicao ref"
                . " INNER JOIN evento ev on ev.ID = ref.FK_HORARIO_REFEICAO "
                . " INNER JOIN funcionario fun on fun.ID = ref.FK_ID_FUNCIONARIO "
                . "WHERE (HORARIO_ENTRADA > '{$dti} 00:00:00' AND HORARIO_ENTRADA < '{$dtf} 23:59:59') ";

        if (!empty($ev)):
            $sql .= " AND ref.FK_HORARIO_REFEICAO = '{$ev}'";
        endif;

        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            foreach ($read->getResult() as $relatorio):
                ?>
                <tr>
                    <td><?= $relatorio['nome'] ?></td>
                    <td><?= $relatorio['refeicao'] ?></td>
                    <td><?= $relatorio['hora'] ?></td>
                </tr>    
                <?php
            endforeach;
            echo "+";
        endif;
    }

}
