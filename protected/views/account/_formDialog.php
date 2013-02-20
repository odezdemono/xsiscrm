<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-type-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton(Yii::t('add','Create'),CHtml::normalizeUrl(array('accounttype/addnew','render'=>false)),array('success'=>'js: function(data) {
                        $("#Account_account_type_id").append(data);
                        $("#acctypeDialog").dialog("close");
                    }'),array('id'=>'closeAcctypeDialog')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->