<?php
$this->breadcrumbs=array(
	'Account Types'=>array('index'),
	'Create',
);

$this->menuContent=array(
	array('label'=>'List AccountType', 'url'=>array('index')),
	array('label'=>'Manage AccountType', 'url'=>array('admin')),
);
?>

<h1>Create AccountType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>