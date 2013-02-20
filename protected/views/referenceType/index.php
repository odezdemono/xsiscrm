<?php
$this->breadcrumbs=array(
	'Reference Types',
);

$this->menuContent=array(
	array('label'=>'Create ReferenceType', 'url'=>array('create')),
	array('label'=>'Manage ReferenceType', 'url'=>array('admin')),
);
?>

<h1>Reference Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
