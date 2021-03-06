<?php
$this->breadcrumbs=array(
	'Technologys'=>array('index'),
	$model->name,
);

$this->menuContent=array(
	array('label'=>'List Technology', 'url'=>array('index')),
	array('label'=>'Create Technology', 'url'=>array('create')),
	array('label'=>'Update Technology', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Technology', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Technology', 'url'=>array('admin')),
);
?>

<h1>View Technology #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'note',
	),
)); ?>
