<?php 
$email = $_GET['email_user'];
$nome = $_GET['nome'];

$url = CHtml::link('Enviar Email', Yii::app()->createAbsoluteUrl('administrador/sendmail',array('email'=>$email_user, 'contato'=>$nome)));

?>

<div class="container-principal">
    <div class="row">
    
        <div>
            <h2>Quase lá!</h2>
            <p>Acesse seu email para validação do cadastro. Caso no tenha recebido nenhum email, click no link: <?php echo $url; ?> 
                
            </p>
            
        </div>
        
        
                
           
    </div>
</div>