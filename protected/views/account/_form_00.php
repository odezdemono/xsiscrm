<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
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
		<?php echo $form->labelEx($model,'source_id'); ?>
		<?php echo $form->textField($model,'source_id'); ?>
		<?php echo $form->error($model,'source_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'account_type_id'); ?>
		<div id="acctype">
		<?php echo $form->dropDownList($model,'account_type_id',AccountType::model()->getOptions(),array('empty'=>'Select Account Type')); ?>
		<?php echo CHtml::ajaxLink(Yii::t('add','Add'),$this->createUrl('accounttype/addnew'),array(
																																									        'onclick'=>'$("#acctypeDialog").dialog("open"); return false;',
																																									        'update'=>'#acctypeDialog'
																																									        ),array('id'=>'showAcctypeDialog'));?>
 		<div id="acctypeDialog"></div>
		</div>
		
		<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
																																	'id'=>'mydialog',
																																	'options'=>array(
																																										'title'=>'Add Account Type',
																																										'width'=>440,
																																										'height'=>190,
																																										'autoOpen'=>false,
																																										'resizable'=>false,
																																										'modal'=>true,
																																										'overlay'=>array(
																																																			'backgroundColor'=>'#000',
																																																			'opacity'=>'0.5'
																																																		),
																																										),
																																));
		?>
		<div class="divForForm"></div>
		<?php	$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
		<script type="text/javascript">
		function addAccountType()
		{
		    <?php echo CHtml::ajax(array(
		            'url'=>array('accounttype/create'),
		            'data'=> "js:$(this).serialize()",
		            'type'=>'post',
		            'dataType'=>'json',
		            'success'=>"function(data)
		            {
		                if (data.status == 'failure')
		                {
		                    $('#mydialog div.divForForm').html(data.div);
		                    $('#mydialog div.divForForm form').submit(addAccountType);
		                }
		                else
		                {
		                    $('#mydialog div.divForForm').html(data.div);
		                    setTimeout(\"$('#mydialog').dialog('close') \",3000);
		                }
		 
		            } ",
		            ))?>;
		    return false; 
		 
		}
		</script>
		<?php echo $form->error($model,'account_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
																																	'model'=>$model,
																																	'attribute'=>'company_id',
																																	'source'=>$this->createUrl('request/suggestCompany'),
																																	'htmlOptions'=>array(
																																		'size'=>'40'
																																	),
																																	)); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'active_status'); ?>
		<?php echo $form->textField($model,'active_status'); ?>
		<?php echo $form->error($model,'active_status'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->