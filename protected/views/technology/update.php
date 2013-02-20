<?php
$this->breadcrumbs=array(
	'Technologys'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Technology', 'url'=>array('index')),
	array('label'=>'Create Technology', 'url'=>array('create')),
	array('label'=>'View Technology', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Technology', 'url'=>array('admin')),
);
?>

<h1>Update Technology <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>