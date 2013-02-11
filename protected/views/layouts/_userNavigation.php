<?php
$this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>'Dev Tools', 'url'=>array('/site/page', 'view'=>'devtools'), 'visible'=>Yii::app()->user->id==1),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'))
	),
));
?>
