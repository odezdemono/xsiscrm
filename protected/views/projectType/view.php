<?php
$this->breadcrumbs=array(
	'Project Types'=>array('index'),
	$model->name,
);

$this->menuContent=array(
	array('label'=>'List ProjectType', 'url'=>array('index')),
	array('label'=>'Create ProjectType', 'url'=>array('create')),
	array('label'=>'Update ProjectType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectType', 'url'=>array('admin')),
);
?>

<h1>View ProjectType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
