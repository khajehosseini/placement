<?php

/* @var $this UserInformationController */
/* @var $model UserExpert */
?>
<script>
	$(document).ready(function(){
	
		$('#linkSubmitId').click(function(e){
			var		expertTypeID	=	$('#expertTypeID').attr('value');
			var		expertID		=	$('#expertID').attr('value');
			if(expertTypeID	==	''	&&	expertID	==	''){
				alert('لطفا نوع تخصص و تخصص را انتخاب کنید');
				e.preventDefault();
			}else if(expertTypeID	==	''){
				alert('لطفا نوع تخصص را انتخاب کنید');
				e.preventDefault();
			}else if(expertID	==	''){
				alert('لطفا تخصص را انتخاب کنید');
				e.preventDefault();
			}		
		});		
	});
</script>
<p>
	<?php echo  CHtml::activeTextArea($modelUserInformation,'expert_other'	,	array('class'=>'span5'	,	'id'	=>	'expertOtherId'	)); ?>
</p>
<p>
	<?php	echo	CHtml::ajaxLink(
												'ثبت تخصص های دیگر',
												Yii::app()->createUrl('information/userinformationupdate')	,
												array(	
													'type'	=>	'POST',
													'data'			=>	array(
																				'name'	=>	'expert_other'	,	'value'	=>	'js:function(){ return $(\'#expertOtherId\').attr(\'value\');}',
																				'user_id'		=>	$user_id
																			)	,
													'success'	=>	"js:function(data){
																						alert('تخصص دیگر با موفقیت ثبت شد');
																				}"
													)
												,array(		'class'	=>	'btn-primary')
																										
											);?>
</p>
<div class="form">

<table  class="items table"  style="float: right; text-align: right; direction: rtl;">
	<thead>
	<tr>
		<th>نوع تخصص</th>
		<th>
		<?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo	CHtml::dropDownList('expert_type',	''	,$list_data,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'expertTypeID'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID").empty();
																	$("#expertID").append(data); }',																
																),
															)
								); 

		?>
		</th>
		
		<th>
		<?php	
			echo	CHtml::dropDownList('expert_code',	''	, array(),array(	'id'	=>	'expertID'	,	'empty'	=>'لطفا انتخاب کنید')); ?>
		</th>
		<th>
			<?php	echo	CHtml::ajaxLink(
												'ارسال',
												Yii::app()->createUrl('information/userexpertsave')	,
												array(	
													'type'	=>	'POST',
													'data'			=>	array(
																				'expert'	=>	'js:function(){ return $(\'#expertID\').attr(\'value\');}'	,
																				'user_id'	=>	$user_id
																			)	,
													'success'	=>	"js:function(data){
																						if (data	==	'exist'){
																							alert('این تخصص قبلا ثبت شده است');
																						}else{
																							$.fn.yiiGridView.update('expert-user-grid');
																						}
																				}"
													)
												,array(	'id'	=>	'linkSubmitId'	,	'class'	=>	'btn-primary')
																										
											);?>
		</th>
	</tr>

</table>
</div><!-- form -->
<?php 
	$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'expert-user-grid',
	'dataProvider'=>$model->search($user_id),
	'filter'=>$model,
	'columns'=>array(

			array(	'name'	=>	'userExpert.title'	,	'header'	=>	'تخصص'	),
			array(	'name'	=>	'userExpert.expertTypeCode.title'	,	'header'	=>	'نوع تخصص'	),		
				
																											
			
																												
			// array(
			// 'class'=>'bootstrap.widgets.TbButtonColumn',
			// ),
	),
	)); 

?>