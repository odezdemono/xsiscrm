<?php
$this->breadcrumbs=array(
	'Person Types'=>array('index'),
	$model->name,
);

$this->menuContent=array(
	array('label'=>'List PersonType', 'url'=>array('index')),
	array('label'=>'Create PersonType', 'url'=>array('create')),
	array('label'=>'Update PersonType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonType', 'url'=>array('admin')),
);
?>

<h1>View PersonType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
