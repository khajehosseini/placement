<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'job-skill-assign-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<p>نوع مهارت</p>
	<?php 
		$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
		echo	CHtml::dropDownList('skill_type',	''	,$list_data,
									array(	
											'empty'	=>	'لطفا انتخاب کنید'	,
											'id'	=>	'skillTypeID'	,	
											'ajax'	=>	array(	
																'type'	=>	'POST',
																'url'		=>	"$url",
																'update'	=>	'#skillID',
																'data'=>array('skill_type_id'=>'js:this.value',),   
																'success'=> 'function(data) {$("#skillID").empty();
																$("#skillID").append(data); }',																
															),
														)
							); 

	?>
	<?php	
			echo	CHtml::dropDownList('skill_code',	''	, array(),array(	'id'	=>	'skillID'	,	'empty'	=>'لطفا انتخاب کنید')); ?>	
	<?php	
		$list_data	=	CHtml::listData(Jobs::model()->findAll(),'id','title');
		echo $form->dropDownListRow($model,'job_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
	?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
