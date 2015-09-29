<?php
/* @var $this AvaliacoesController */
/* @var $model Avaliacao */

$this->breadcrumbs=array(
	'Avaliacaos'=>array('index'),
	$model->avaliacaoID=>array('view','id'=>$model->avaliacaoID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Avaliacao', 'url'=>array('index')),
	array('label'=>'Create Avaliacao', 'url'=>array('create')),
	array('label'=>'View Avaliacao', 'url'=>array('view', 'id'=>$model->avaliacaoID)),
	array('label'=>'Manage Avaliacao', 'url'=>array('admin')),
);
?>

<h1>Update Avaliacao <?php echo $model->avaliacaoID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>