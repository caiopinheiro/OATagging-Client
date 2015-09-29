<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Cadastro de Usuário', 'url'=>array('create')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
