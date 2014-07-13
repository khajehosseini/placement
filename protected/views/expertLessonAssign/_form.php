<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'expert-lesson-assign-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<p>نوع تخصص</p>
	<?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo	CHtml::dropDownList('expert_type',	''	,$list_data,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'expertTypeID'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	"$url",
																	'update'	=>	'#expertID',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID").empty();
																	$("#expertID").append(data); }',																
																),
															)
								); 

		?>
	<?php	
			echo	CHtml::dropDownList('expert_code',	''	, array(),array(	'id'	=>	'expertID'	,	'empty'	=>'لطفا انتخاب کنید')); ?>	

	<?php	
		$list_data	=	CHtml::listData(TLessonGroup::model()->findAll(),'id','title');
		echo $form->dropDownListRow($model,'lesson_group_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
	?>	
	


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
