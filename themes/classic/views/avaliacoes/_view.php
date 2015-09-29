<?php
/* @var $this AvaliacoesController */
/* @var $data Avaliacao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('avaliacaoID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->avaliacaoID), array('view', 'id'=>$data->avaliacaoID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('videoID')); ?>:</b>
	<?php echo CHtml::encode($data->videoID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_user')); ?>:</b>
	<?php echo CHtml::encode($data->email_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags_suggested')); ?>:</b>
	<?php echo CHtml::encode($data->tags_suggested); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags_random')); ?>:</b>
	<?php echo CHtml::encode($data->tags_random); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags_selected')); ?>:</b>
	<?php echo CHtml::encode($data->tags_selected); ?>
	<br />


</div>