<?php
/* @var $this UsuariosController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->email_user,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->email_user)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email_user),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>View Usuario #<?php echo $model->email_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email_user',
		'faixa_etaria',
		'nivel_esc',
		'conhec_area',
	),
)); ?>
