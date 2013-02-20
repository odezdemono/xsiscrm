<?php
$this->breadcrumbs=array(
	'Project Contacts',
);

$this->menu=array(
	array('label'=>'Create ProjectContact', 'url'=>array('create')),
	array('label'=>'Manage ProjectContact', 'url'=>array('admin')),
);
?>

<h1>Project Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
