<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$email = $_GET['email_user'];

$url = CHtml::link('Enviar Email', Yii::app()->createAbsoluteUrl('administrador/recoverpassword',array('email'=>$email_user)));

?>

<div class="container-principal">
    <div class="row">
    
        <div>
            <h2>Erro</h2>
            <p>Ocorreu um erro ao enviar o email de recuperação de senha. Tente outra vez. Cl ick no link: <?php echo $url; ?> </p>
            
        </div>
        
        
                
           
    </div>
</div>