<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <h1> Feed de Notícias via RES API.</h1>
        
        <?php foreach ($data as $row): 
            
//     var_dump($row);exit;
            ?>
        
        <p>EXERCICIO:<?= $row['EXERCICIO'] ?></p>
        <p>DESCRIÇÃO:<?= $row['DESCRICAO'] ?></p>
        <p>ATIVO:<?= $row['ATIVO'] ?></p>
        <p>DATA_TERMINO:<?= $row['DT_PRAZO_ENTREGA_TERMINO'] ?></p>
        <p>STATUS:<?= $row['STATUS'] ?></p>
        <!--<p>Status:</p>-->
        
        <?php endforeach; ?>
        
    </div>
</div>
