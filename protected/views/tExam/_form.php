<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'texam-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
	<?php	
		$list_data	=	CHtml::listData(TLessonGroup::model()->findAll(),'id','title');
		echo $form->dropDownListRow($model,'lesson_group_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
	?>

	
	<?php echo $form->textFieldRow($model,'testi_conut',array('class'=>'span5')); ?>


	<?php echo $form->textFieldRow($model,'tashrihi_count',array('class'=>'span5')); ?>

	<?php	
		$list_data	=	array('0'	=>	'غیر فعال'	,	'1'	=>	'فعال');
		echo $form->dropDownListRow($model,'status',$list_data ,	array(	'class'=>'span5')	);
	?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
