<?php
/* @var $this AvaliacoesController */
/* @var $model Avaliacao */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'avaliacaoID'); ?>
		<?php echo $form->textField($model,'avaliacaoID',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'videoID'); ?>
		<?php echo $form->textField($model,'videoID',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags_suggested'); ?>
		<?php echo $form->textArea($model,'tags_suggested',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags_random'); ?>
		<?php echo $form->textArea($model,'tags_random',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags_selected'); ?>
		<?php echo $form->textArea($model,'tags_selected',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->