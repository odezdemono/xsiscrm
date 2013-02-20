<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>Create Account</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>