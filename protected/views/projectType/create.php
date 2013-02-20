<?php
$this->breadcrumbs=array(
	'Project Types'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List ProjectType', 'url'=>array('index')),
	array('label'=>'Manage ProjectType', 'url'=>array('admin')),
);
?>

<h1>Create ProjectType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>