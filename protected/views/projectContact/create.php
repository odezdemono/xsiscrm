<?php
$this->breadcrumbs=array(
	'Project Contacts'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List ProjectContact', 'url'=>array('index')),
	array('label'=>'Manage ProjectContact', 'url'=>array('admin')),
);
?>

<h1>Create ProjectContact</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4)); ?>