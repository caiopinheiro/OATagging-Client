<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$email = $_GET['email_user'];
$nome = $_GET['nome'];

$url = CHtml::link('Enviar Email', Yii::app()->createAbsoluteUrl('administrador/sendmail',array('email'=>$email_user, 'contato'=>$nome)));

?>

<div class="container-principal">
    <div class="row">
    
        <div>
            <h2>Erro</h2>
            <p>Seu cadastro foi efetuado, porém ocorreu um erro ao enviar o email de validação. Tente outra vez. Cl ick no link: <?php echo $url; ?> </p>
            
        </div>
        
        
                
           
    </div>
</div>