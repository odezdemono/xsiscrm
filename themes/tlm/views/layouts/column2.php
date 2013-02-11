<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>$this->menuTitle,
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menuContent,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
</div><!-- sidebar -->
<?php $this->endContent(); ?>