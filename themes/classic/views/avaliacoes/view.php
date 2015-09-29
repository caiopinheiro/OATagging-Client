<?php
/* @var $this AvaliacoesController */
/* @var $model Avaliacao */

$this->breadcrumbs=array(
	'Avaliacaos'=>array('index'),
	$model->avaliacaoID,
);

$this->menu=array(
	array('label'=>'List Avaliacao', 'url'=>array('index')),
	array('label'=>'Create Avaliacao', 'url'=>array('create')),
	array('label'=>'Update Avaliacao', 'url'=>array('update', 'id'=>$model->avaliacaoID)),
	array('label'=>'Delete Avaliacao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->avaliacaoID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Avaliacao', 'url'=>array('admin')),
);
?>

<h1>View Avaliacao #<?php echo $model->avaliacaoID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'avaliacaoID',
		'videoID',
		'email_user',
		'tags_suggested',
		'tags_random',
		'tags_selected',
	),
)); ?>
