<?php
/* @var $this UsuariosController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<script>
    function validadeProfileAging() {
            aging = document.getElementById("ctrl-grp-aging");
            aging.className = "form-group";
            picked = document.getElementById('aging').options[document.getElementById('aging').selectedIndex].value;
            if (picked == 1) {
                    aging.className = aging.className + " has-error";

            }
    }

    function validadeProfileEducation() {
            education = document.getElementById("ctrl-grp-education");
            education.className = "form-group";
            picked = document.getElementById('education').options[document.getElementById('education').selectedIndex].value;
            if (picked == 1) {
                    education.className = education.className + " has-error";

            }
    }

    function validadeProfileFunness() {

            funness = document.getElementById("ctrl-grp-funness");
            funness.className = "form-group";
            picked = document.getElementById('funness').options[document.getElementById('funness').selectedIndex].value;
            if (picked == 1) {
                    funness.className = funness.className + " has-error";

            }
    }

</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,"tipo_user", array("value"=>2))?>
        <?php echo $form->hiddenField($model,"validacao", array("value"=>0))?>
        <?php // echo $form->hiddenField($model,"tipo_maq", array("value"=>1))?>
        <div class="form-group" id="ctrl-grp-funness">
		<?php echo $form->labelEx($model,'nome', array("class"=>'control-label')); ?>
		<?php echo $form->textField($model,'nome',array('size'=>100,'maxlength'=>100,'class'=>'form-control' )); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>
        
	<div class="form-group" id="ctrl-grp-funness">
		<?php echo $form->labelEx($model,'email_user',array("class"=>'control-label')); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email_user'); ?>
	</div>

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
        
        <div class="form-group" id="ctrl-grp-funness">
            <label class="control-label" for="awareness">Qual o seu conhecimento na área de esportes? *</label>

<!--            <select name="Usuario[conhec_area]" id= "funness" class="form-control input-sm-2" onchange="validadeProfileFunness()" onclick="validadeProfileFunness()">
                    <option value="1">-----------------</option>
                    <option value="Eu não entendo">Eu não entendo</option>
                    <option value="Tenho assistidos as finais">Tenho assistidos as finais</option>
                    <option value="Sou um grande fã">Sou um grande fã</option>
            </select>-->
            <?php  echo CHtml::dropDownList('Usuario[conhec_area]','', array(1=>'Eu não entendo',
                                                                             2=>'Tenho assistidos as finais',
                                                                             3=>'Sou um grande fã'),  
                                                                       array("class"=> 'form-control', 'prompt'=>'Selecione'));?>

        </div>
        <div class="form-group" id="ctrl-grp-education">
                <label class="control-label" for="education">Qual seu nível de escolaridade? *</label>

<!--                <select name="Usuario[nivel_esc]" id= "education" class="form-control input-sm-2" onchange="validadeProfileEducation()" onclick="validadeProfileEducation()">
                        <option value="1">--------------</option>
                        <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                        <option value="Fundamental Completo">Fundamental Completo</option>
                        <option value="Ensino Médio Imcompleto">Ensino Médio Imcompleto</option>
                        <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                        <option value="Superior Imcompleto">Superior Imcompleto</option>
                        <option value="Superior Completo">Superior Completo</option>
                </select>-->
                 
                <?php  echo CHtml::dropDownList('Usuario[nivel_esc]','', array(1=>'Fundamental Incompleto',
                                                                               2=>'Fundamental Completo',
                                                                               3=>'Ensino Médio Imcompleto',
                                                                               4=>'Ensino Médio Completo',
                                                                               5=>'Superior Imcompleto',
                                                                               6=>'Superior Completo'),  
                                                                         array("class"=> 'form-control', 'prompt'=>'Selecione' ));?>
        </div>
        <div class="form-group" id="ctrl-grp-aging">
                <label class= "control-label" for="aging">Qual sua faixa etária? *</label>

<!--                <select name="Usuario[faixa_etaria]" id= "aging" class="form-control input-sm-2" onchange="validadeProfileAging()" onclick="validadeProfileAging()">
                        <option value="1">----------------</option>
                        <option value="18-25 Anos">18-25 Anos</option>
                        <option value="26-35 Anos">26-35 Anos</option>
                        <option value="36-45 Anos">36-45 Anos</option>
                        <option value="46-55 Anos">46-55 Anos</option>
                        <option value="56-65 Anos">56-65 Anos</option>
                        <option value="Maior que 65 anos">Maior que 65 anos</option>
                </select>-->
                <?php  echo CHtml::dropDownList('Usuario[faixa_etaria]','', array(1=>'18-25 Anos',
                                                                                  2=>'26-35 Anos',
                                                                                  3=>'36-45 Anos',
                                                                                  4=>'46-55 Anos',
                                                                                  5=>'56-65 Anos',
                                                                                  6=>'Maior que 65 anos',),  
                                                                            array("class"=> 'form-control', 'prompt'=>'Selecione' ));?>

        </div>
        
               
                
        
        
        
<!--        <div class="row">
		<?php //echo $form->labelEx($model,'faixa_etaria'); ?>
		<?php //echo $form->textArea($model,'faixa_etaria',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'faixa_etaria'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'nivel_esc'); ?>
		<?php //echo $form->textArea($model,'nivel_esc',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'nivel_esc'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'conhec_area'); ?>
		<?php //echo $form->textArea($model,'conhec_area',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'conhec_area'); ?>
	</div-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->