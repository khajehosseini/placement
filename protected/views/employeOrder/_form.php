<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'employe-order-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php 
	$list_data	=	CHtml::listData(Jobs::model()->findAll(),'id','title');
	echo $form->dropDownList(	
								$model	,
								'job_code',
								$list_data	,
								array(	
										'empty'	=>	'لطفا انتخاب کنيد'	,
										'id'	=>	'jobID'	,	
										'ajax'	=>	array(	
															'type'	=>	'POST',
															'url'		=>	'expertAndSkillByJobCode',
															'update'	=>	'#content-job',
															'data'=>array('jobCodeId'=>'js:this.value',),   
															'success'=> 'function(data) {
															$("#content-job").html(data);
															
															}',																
														),
													)
						); ?><span class="required">*</span>
	<div	id="content-job">
	<?php
	if(!$model->isNewRecord){
	$modelE	=	new	JobExpertAssign;
	$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'skill-user-grid',
		'dataProvider'=>$modelE->searchR($model->job_code),
		'filter'=>$modelE,
		'columns'=>array(
		array(	'name'	=>	'expertCode.title'	,	'header'	=>	'تخصص'	),
		),
		));
	echo	'<br>';
	$modelS	=	new	JobSkillAssign;
	$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'skill-user-grid',
		'dataProvider'=>$modelS->searchR($model->job_code),
		'filter'=>$modelS,
		'columns'=>array(
		array(	'name'	=>	'skillCode.title'	,	'header'	=>	'مهارت'	),
		),
		));
	}	
		?>
	
	</div>
	<table style="border: 1px solid; direction: rtl; float: right; text-align: right;">
		<tr><td	colspan="3">تخصص دیگر در صورت نیاز</td></tr>
		<tr>
			<td>ردیف</td>
			<td>تخصص</td>
			<td></td>
		</tr>
		<?php	
		$row	=	0	;
		if(!$model->isNewRecord){
			//die($model->id);
			$model_expert=EmployeOrderExpert::model()->with('Experts')->findAll('employe_order_code=:employe_order_code_id'	,	array(':employe_order_code_id'=>"{$model->id}"));
			if($model_expert	!=	null){
				$html	=	'';
				foreach	($model_expert	as 	$k	=>	$arrData){
						$row	=	$k	+1;
						$html	.="
						<tr>
							<td>$row</td>
							<td>{$arrData->Experts[0]->title}</td>
							<td><a>حذف</a></td>
						</tr>	";		
				}
				echo $html;
			}
		}
		?>
		<tr>
			<td>ردیف</td>
			<td>نوع تخصص</td>
			<td>تخصص</td>
		</tr>
		<tr>
			<td><?php	echo ++$row;?>	</td>
			<td><?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'expert_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'ExpertTypeID1'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID1',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID1").empty();
																	$("#expertID1").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('expert_code[1]'	,''	,array()	,	array(	'id'	=>	'expertID1'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td><?php	echo ++$row;?></td>
			<td><?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'expert_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'ExpertTypeID2'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID2',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID2").empty();
																	$("#expertID2").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('expert_code[2]'	,''	,array()	,	array(	'id'	=>	'expertID2'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td><?php	echo ++$row;?></td>
			<td><?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'expert_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'ExpertTypeID3'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID3',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID3").empty();
																	$("#expertID3").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('expert_code[3]'	,''	,array()	,	array(	'id'	=>	'expertID3'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td><?php	echo ++$row;?></td>
			<td><?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'expert_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'ExpertTypeID4'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID4',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID4").empty();
																	$("#expertID4").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('expert_code[4]'	,''	,array()	,	array(	'id'	=>	'expertID4'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td><?php	echo ++$row;?></td>
			<td><?php 
			$list_data	=	CHtml::listData(ExpertType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'expert_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'ExpertTypeID5'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'expert',
																	'update'	=>	'#expertID5',
																	'data'=>array('expert_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#expertID5").empty();
																	$("#expertID5").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('expert_code[5]'	,''	,array()	,	array(	'id'	=>	'expertID5'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
	</table>
	<?php echo $form->textAreaRow($model,'expert_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		<table style="border: 1px solid; direction: rtl; float: right; text-align: right;">
		<tr><td	colspan="3">مهارت های دیگر در صورت نیاز</td></tr>
				<tr>
			<td>ردیف</td>
			<td>مهارت</td>
			<td></td>
		</tr>
		<?php	
		$row	=	0	;
		if(!$model->isNewRecord){
			//die($model->id);
			$model_skill=EmployeOrderSkill::model()->with('Skills')->findAll('employe_order_code=:employe_order_code_id'	,	array(':employe_order_code_id'=>"{$model->id}"));
			if($model_skill	!=	null){
				$html	=	'';
				foreach	($model_skill	as 	$k	=>	$arrData){
						$row	=	$k	+1;
						$html	.="
						<tr>
							<td>$row</td>
							<td>{$arrData->Skills[0]->title}</td>
							<td><a>حذف</a></td>
						</tr>	";		
				}
				echo $html;
			}
		}
		?>
		<tr>
			<td>ردیف</td>
			<td>نوع مهارت</td>
			<td>مهارت</td>
		</tr>
		<tr>
			<td>1</td>
			<td><?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'skill_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'SkillTypeID1'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID1',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID1").empty();
																	$("#skillID1").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('skill_code[1]'	,''	,array()	,	array(	'id'	=>	'skillID1'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td><?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'skill_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'SkillTypeID2'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID2',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID2").empty();
																	$("#skillID2").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('skill_code[2]'	,''	,array()	,	array(	'id'	=>	'skillID2'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td><?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'skill_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'SkillTypeID3'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID3',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID3").empty();
																	$("#skillID3").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('skill_code[3]'	,''	,array()	,	array(	'id'	=>	'skillID3'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td><?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'skill_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'skillTypeID4'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID4',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID4").empty();
																	$("#skillID4").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('skill_code[4]'	,''	,array()	,	array(	'id'	=>	'skillID4'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
		<tr>
			<td>5</td>
			<td><?php 
			$list_data	=	CHtml::listData(SkillType::model()->findAll(),'id','title');
			echo CHtml::dropDownList(	'skill_code_type',
										'',$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'id'	=>	'SkillTypeID5'	,	
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'skill',
																	'update'	=>	'#skillID5',
																	'data'=>array('skill_type_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#skillID5").empty();
																	$("#skillID5").append(data); }',																
																),
															)
								); ?></td>
			<td><?php 	echo CHtml::dropDownList('skill_code[5]'	,''	,array()	,	array(	'id'	=>	'skillID5'	,	'empty'	=>'لطفا انتخاب کنید')); ?></td>
		</tr>
	</table>

	<?php echo $form->textAreaRow($model,'skill_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php	
		$listData	=	array(	'0'	=>	'مرد'	,	'1'	=>	'زن',	'2'	=>	'فرقی نمی کند'	);
		echo $form->dropDownListRow(	$model	,	'sex'	,	$listData	,	array('class'=>'span5'	,	'empty'	=>'لطفا انتخاب کنید'));
	?>
	<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'expire_date',array('class'=>'span5')); ?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
