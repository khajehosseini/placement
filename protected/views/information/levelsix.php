<?php
/* @var $this UserInformationController */
/* @var $model UserSkill */
?>
<script>
	$(document).ready(function(){
	
		$('#linkSubmitId').click(function(e){
			var		skillTypeID	=	$('#skillTypeID').attr('value');
			var		skillID		=	$('#skillID').attr('value');
			if(skillTypeID	==	''	&&	skillID	==	''){
				alert('لطفا نوع مهارت و مهارت را انتخاب کنید');
				e.preventDefault();
			}else if(skillTypeID	==	''){
				alert('لطفا نوع مهارت را انتخاب کنید');
				e.preventDefault();
			}else if(skillID	==	''){
				alert('لطفا مهارت را انتخاب کنید');
				e.preventDefault();
			}		
		});		
	});
</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-information-UserInformation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
<p>
	<?php echo $form->textArea($modelUserInformation,'skill_other',array('class'=>'span5'	,	'id'	=>	'skillOtherId'	)); ?>
</p>
<p>
	<?php	echo	CHtml::ajaxLink(
												'ثبت مهارت های دیگر',
												Yii::app()->createUrl('information/userinformationupdate')	,
												array(	
													'type'	=>	'POST',
													'data'			=>	array(
																				'name'	=>	'skill_other'	,	'value'	=>	'js:function(){ return $(\'#skillOtherId\').attr(\'value\');}'
																			)	,
													'success'	=>	"js:function(data){
																						alert('مهارت های دیگر با موفقیت ثبت شد');
																				}"
													)
												,array(		'class'	=>	'btn-primary')
																										
											);?>
</p>

<div class="form">
<table  class="items table"  style="float: right; text-align: right; direction: rtl;">
	<thead>
	<tr>
		<th>نوع مهارت</th>
		<th>
		<?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo $form->dropDownList(	
										$model	,
										'skill_type_code',
										$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'skillTypeID'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID").empty();
																	$("#skillID").append(data); }',																
																),
															)
								); ?>
		</th>
		<th>
		<?php	
			echo $form->dropDownList($model,'skill_code'	,	array()	,	array(	'id'	=>	'skillID'	,	'empty'	=>'لطفا انتخاب کنید')); ?>	
			<?php echo $form->error($model,'skill_code'); ?>
		</th>
		<th>
			<?php	echo	CHtml::ajaxLink(
												'ارسال',
												Yii::app()->createUrl('information/userskillsave')	,
												array(	
													'type'	=>	'POST',
													'data'			=>	array(
																				'skill'	=>	'js:function(){ return $(\'#skillID\').attr(\'value\');}'
																			)	,
													'success'	=>	"js:function(data){
																						if (data	==	'exist'){
																							alert('این مهارت قبلا ثبت شده است');
																						}else{
																							$.fn.yiiGridView.update('skill-user-grid');
																						}
																				}"
													)
												,array(	'id'	=>	'linkSubmitId'	,	'class'	=>	'btn-primary')
																										
											);?>
		</th>
	</tr>

</table>
</div><!-- form -->

<?php $this->endWidget(); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'skill-user-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(	'name'	=>	'userSkill.title'	,	'header'	=>	'مهارت'	),
		array(	'name'	=>	'userSkill.skillTypeCode.title'	,	'header'	=>	'نوع مهارت'	),		
//todo ::yadllah
// array(
// 'class'=>'bootstrap.widgets.TbButtonColumn',
// ),
),
)); ?>