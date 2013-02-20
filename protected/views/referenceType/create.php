<?php
$this->breadcrumbs=array(
	'Reference Types'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List ReferenceType', 'url'=>array('index')),
	array('label'=>'Manage ReferenceType', 'url'=>array('admin')),
);
?>

<h1>Create ReferenceType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>