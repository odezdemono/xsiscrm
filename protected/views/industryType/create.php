<?php
$this->breadcrumbs=array(
	'Industry Types'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List IndustryType', 'url'=>array('index')),
	array('label'=>'Manage IndustryType', 'url'=>array('admin')),
);
?>

<h1>Create IndustryType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>