<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-contact-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model2,'address'); ?>
		<?php echo $form->textField($model2,'address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'address'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model4,'phone'); ?>
		<?php echo $form->textField($model4,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model4,'phone'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model3,'address'); ?>
		<?php echo $form->textField($model3,'address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model3,'address'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
																																	'model'=>$model,
																																	'attribute'=>'project_id',
																																	//'name'=>'name',
																																	'source'=>$this->createUrl('request/suggestProject'),
																																	/*'options'=>array(
																																				        'minLength'=>'100',
																																				        'select'=>"js:function(event, ui) {
																																				                    $('#Project_company_id').val(ui.item.Project_company_id);
																																				                    $('#Company_name').val(ui.item.Company_name);
																																				                  }",
																																				     ),*/
																																	'htmlOptions'=>array(
																																		'style'=>'width:400px',
																																		'placeHolder'=>'Project Name',
																																	),
																																	)); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->