<?php
/* @var $this AvaliacoesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Avaliacaos',
);

//$this->menu=array(
//	array('label'=>'Create Avaliacao', 'url'=>array('create')),
//	array('label'=>'Manage Avaliacao', 'url'=>array('admin')),
//);
?>

<h1>Tagging</h1>

<div class="container">
    <input id= "tipo_maq" type="hidden" value = <?php echo Yii::app()->user->getState('tipo_maq'); ?> > 
			<!-- Static navbar -->
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">OATagging</a>
					</div>
					<!--div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active">
								<a href="./">About</a>
							</li
						</ul>
					</div--><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</nav>

			<div class="panel panel-default">
				<div class="row">
					<div class="col-sm-7">
						<div class="panel panel-default">
							<div class="panel panel-heading">
								Video
							</div>
							<div class="panel panel-body" id="videoContainer">

							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="panel panel-info">
							<div class="panel-heading">Recomendados</div>
							<div class="panel-body" id= "tag-recommended" ondrop="drop(event)" ondragover="allowDrop(event)" ondragend="dragend(event, 2)">
								
								<!--textarea class="hidden">
									drag as tags selecionadas aqui!!! 
								</textarea-->
								
							</div>
						</div>
						<!--/div>
						<div class="col-sm-3"-->
						<div class="panel panel-success">
							<div class="panel-heading">Selecionados</div>
							<div class="panel-body" id="tag-selected" ondrop="drop(event)" ondragover="allowDrop(event)" ondragend="dragend(event, 1)">
								<textarea class="hidden">
								drop as tags selecionadas aqui!!! 
							</textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a class="btn btn-lg btn-primary" id = "btn-proximo" disabled="disabled" onclick="saveTags()" role="button" value="0">Próximo &raquo;</a>
				</div>
			</div>
		</div>

