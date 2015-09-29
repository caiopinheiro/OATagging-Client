<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'action'=>"index.php?r=administrador/newpassword",
        'method'=>"post"
)); 

?>
<h2>Recuperar Senha</h2>

<input type="hidden" name="Usuario[_id]" value= <?php echo $_id; ?> >
<!--<form method="post" action="index.php?r=administrador/newpassword"-->
<div class="form-group" id="ctrl-grp-funness">
    <?php echo $form->labelEx($model,'senha',array("class"=>'control-label')); ?>
    <?php echo $form->passwordField($model,'senha',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'senha'); ?>
</div>

<div class="form-group" id="ctrl-grp-funness">
    <?php echo $form->labelEx($model,'confirmar_senha',array("class"=>'control-label')); ?>
    <?php echo $form->passwordField($model,'confirmar_senha',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'confirmar_senha'); ?>
</div>

 <input type="submit" value="Salvar">  
<!--</form>-->


<?php $this->endWidget(); ?>
