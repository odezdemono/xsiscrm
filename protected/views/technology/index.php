<?php
$this->breadcrumbs=array(
	'Technologys',
);

$this->menuContent=array(
	array('label'=>'Create Technology', 'url'=>array('create')),
	array('label'=>'Manage Technology', 'url'=>array('admin')),
);
?>

<h1>Technologys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
