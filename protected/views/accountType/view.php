<?php
$this->breadcrumbs=array(
	'Account Types'=>array('index'),
	$model->name,
);

$this->menuContent=array(
	array('label'=>'List AccountType', 'url'=>array('index')),
	array('label'=>'Create AccountType', 'url'=>array('create')),
	array('label'=>'Update AccountType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountType', 'url'=>array('admin')),
);
?>

<h1>View AccountType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
