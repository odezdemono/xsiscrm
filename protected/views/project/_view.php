<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->reference_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimate_budget')); ?>:</b>
	<?php echo CHtml::encode($data->estimate_budget); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('activive_status')); ?>:</b>
	<?php echo CHtml::encode($data->activive_status); ?>
	<br />

	*/ ?>

</div>