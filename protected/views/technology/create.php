<?php
$this->breadcrumbs=array(
	'Technologys'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List Technology', 'url'=>array('index')),
	array('label'=>'Manage Technology', 'url'=>array('admin')),
);
?>

<h1>Create Technology</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>