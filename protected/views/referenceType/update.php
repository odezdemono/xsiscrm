<?php
$this->breadcrumbs=array(
	'Reference Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReferenceType', 'url'=>array('index')),
	array('label'=>'Create ReferenceType', 'url'=>array('create')),
	array('label'=>'View ReferenceType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReferenceType', 'url'=>array('admin')),
);
?>

<h1>Update ReferenceType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>