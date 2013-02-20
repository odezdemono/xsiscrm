<?php
$this->breadcrumbs=array(
	'Account Types',
);

$this->menuContent=array(
	array('label'=>'Create AccountType', 'url'=>array('create')),
	array('label'=>'Manage AccountType', 'url'=>array('admin')),
);
?>

<h1>Account Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
