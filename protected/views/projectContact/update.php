<?php
$this->breadcrumbs=array(
	'Project Contacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menuContent=array(
	array('label'=>'List ProjectContact', 'url'=>array('index')),
	array('label'=>'Create ProjectContact', 'url'=>array('create')),
	array('label'=>'View ProjectContact', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectContact', 'url'=>array('admin')),
);
?>

<h1>Update ProjectContact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4)); ?>