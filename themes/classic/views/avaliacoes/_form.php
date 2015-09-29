<?php
/* @var $this AvaliacoesController */
/* @var $model Avaliacao */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'avaliacao-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'videoID'); ?>
		<?php echo $form->textField($model,'videoID',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'videoID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags_suggested'); ?>
		<?php echo $form->textArea($model,'tags_suggested',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags_suggested'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags_random'); ?>
		<?php echo $form->textArea($model,'tags_random',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags_random'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags_selected'); ?>
		<?php echo $form->textArea($model,'tags_selected',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags_selected'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->