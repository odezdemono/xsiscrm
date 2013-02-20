<?php
$this->breadcrumbs=array(
	'Project Contacts'=>array('index'),
	$model->id,
);

$this->menuContent=array(
	array('label'=>'List ProjectContact', 'url'=>array('index')),
	array('label'=>'Create ProjectContact', 'url'=>array('create')),
	array('label'=>'Update ProjectContact', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectContact', 'url'=>array('admin')),
);
?>

<h1>View ProjectContact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'project_id',
	),
)); ?>
