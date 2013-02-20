<?php
$this->breadcrumbs=array(
	'Person Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonType', 'url'=>array('index')),
	array('label'=>'Create PersonType', 'url'=>array('create')),
	array('label'=>'View PersonType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonType', 'url'=>array('admin')),
);
?>

<h1>Update PersonType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>