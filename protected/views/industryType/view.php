<?php
$this->breadcrumbs=array(
	'Industry Types'=>array('index'),
	$model->name,
);

$this->menuContent=array(
	array('label'=>'List IndustryType', 'url'=>array('index')),
	array('label'=>'Create IndustryType', 'url'=>array('create')),
	array('label'=>'Update IndustryType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IndustryType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IndustryType', 'url'=>array('admin')),
);
?>

<h1>View IndustryType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
