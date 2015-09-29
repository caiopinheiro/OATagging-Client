<?php
/* @var $this UsuariosController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->email_user=>array('view','id'=>$model->email_user),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->email_user)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Update Usuario <?php echo $model->email_user; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>