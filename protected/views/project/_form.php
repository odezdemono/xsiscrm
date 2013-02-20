<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php //echo $form->hiddenField($model,'company_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
																																	'model'=>$model,
																																	'attribute'=>'company_id',
																																	'source'=>$this->createUrl('request/suggestCompany'),
																																	'htmlOptions'=>array(
																																		'style'=>'width:400px',
																																		'placeHolder'=>'Company Name',
																																	),
																																	)); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_type_id'); ?>
		<?php echo $form->dropDownList($model,'project_type_id',ProjectType::model()->getOptions(),array('empty'=>'Select Project Type')); ?>
		<?php echo $form->error($model,'project_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference_type_id'); ?>
		<?php echo $form->dropDownList($model,'reference_type_id',ReferenceType::model()->getOptions(),array('empty'=>'Select Reference Type')); ?>
		<?php echo $form->error($model,'reference_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_budget'); ?>
		<?php echo $form->textField($model,'estimate_budget',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'estimate_budget'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'technology_id'); ?>
		<?php //echo $form->dropDownList($model2,'technology_id',Technology::model()->getOptions(),array('empty'=>'Select Technology',/*'multiple'=>true*/)); ?>
		<?php //echo $form->listBox($model2,'technology_id',Technology::model()->getOptions(),array('size'=>5,/*'multiple'=>true,*/'prompt'=>'Use [Ctrl] to select')); ?>
		<?php $this->widget('EchMultiSelect', array(
												'model'=>$model2,
												'dropDownAttribute'=>'technology_id',
												'data'=>Technology::model()->getOptions(),
												'dropDownHtmlOptions'=>array('style'=>'width:400px'),
												)); ?>
		<?php echo $form->error($model2,'technology_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->