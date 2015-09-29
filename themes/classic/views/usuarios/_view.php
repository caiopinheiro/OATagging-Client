<?php
/* @var $this UsuariosController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_user')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email_user), array('view', 'id'=>$data->email_user)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('faixa_etaria')); ?>:</b>
	<?php echo CHtml::encode($data->faixa_etaria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_esc')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_esc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conhec_area')); ?>:</b>
	<?php echo CHtml::encode($data->conhec_area); ?>
	<br />


</div>