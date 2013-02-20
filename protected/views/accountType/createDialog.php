<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'acctypeDialog',
                'options'=>array(
                    'title'=>Yii::t('accounttype','Buat Account Type Baru'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
										'resizeable'=>false,
                ),
                ));
echo $this->renderPartial('_formDialog', array('model'=>$model)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>