<?php
/* @var $this UserInformationController */
/* @var $model UserInformation */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-information-UserInformation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->radioButton($model,'sex',array('value'	=>	'0')); ?> 
		<span>مرد</span>
		<?php echo $form->radioButton($model,'sex' ); ?> 
		<span>زن</span>
		<?php echo $form->error($model,'sex'); ?>
	</div>
	<div class="row">
		<?php echo $form->radioButton($model,'marrie_status' ,array('value'	=>	'0')); ?> 	
		<span>متاهل</span>			
		<?php echo $form->radioButton($model,'marrie_status' ); ?> 
		<span>مجرد</span>
		<?php echo $form->error($model,'marrie_status'); ?>
	</div>	
	<div class="row">
		<?php 
			$list_data	=	CHtml::listData(Religion::model()->findAll(),'id','title');
			echo $form->labelEx($model,'religion_code'); ?>
		<?php echo $form->dropDownList(	$model,'religion_code'	,	$list_data	,	array('id'	=>	'religion_id','empty'	=>	'لطفا انتخاب کنید'	,

				'onChange'	=>	'	
										if($("#religion_id").attr("value")	==	5)
											$("#box_religion_other").show("slow");
										else
											$("#box_religion_other").hide("slow");
													
									')
				); ?>
		<?php echo $form->error($model,'religion_code'); ?>
	</div>
	<div class="row" id="box_religion_other"  style="<?php echo ($model->religion_code	==	5)?"display: block;":"display: none;";?>">
		<?php echo $form->labelEx($model,'religion_other'); ?>
		<?php echo $form->textField($model,'religion_other'); ?>
		<?php echo $form->error($model,'religion_other'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone'); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'meli_num'); ?>
		<?php echo $form->textField($model,'meli_num'); ?>
		<?php echo $form->error($model,'meli_num'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'birth_date'); ?>
			<?php
			$model->birth_date	=	gergorian_to_jalali_string($model->birth_date);
			$this->widget('ext.jalaliCalendar.JalaliCalendar', array(
				'model'=>$model,
				'attribute'=>'birth_date',
				'options'=>array(
					'button'=>'date_btn',
					'ifFormat'=> '%Y/%m/%d',
					'dateType'=>'jalali'
				)
			));
		?>
		<?php echo $form->error($model,'birth_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'state_code'); ?>
		<?php 
			$list_data	=	CHtml::listData(State::model()->findAll(),'id','title');
			echo $form->dropDownList(	
										$model	,
										'state_code',
										$list_data	,
										array(	
												'empty'	=>	'لطفا انتخاب کنید'	,
												'ajax'	=>	array(	
																	'type'	=>	'POST',
																	'url'		=>	'city',
																	'update'	=>	'#cityID',
																	'data'=>array('state_id'=>'js:this.value',),   
																	'success'=> 'function(data) {$("#cityId").empty();
																	$("#cityId").append(data); }',																
																),
															)
								); ?>
		<?php echo $form->error($model,'state_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_code'); ?>
		<?php	
			$list_data	=	CHtml::listData(City::model()->findAll(),'id','title');
			echo $form->dropDownList($model,'city_code'	,	$list_data	,	array(	'id'	=>	'cityId'	,	'empty'	=>'لطفا انتخاب کنید')); ?>
		<?php echo $form->error($model,'city_code'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
	<?php
			$user_id	=	Yii::app()->user->id;
			
			if( !is_dir( "upload/user_$user_id/profile")){
				@mkdir("upload/user_$user_id");
				@mkdir("upload/user_$user_id/profile");
			}					
			$this->widget('ext.EAjaxUpload.EAjaxUpload',
			 array(
				   'id'=>'uploadFile',
				   'config'=>array(
								   'action'=>Yii::app()->createUrl('upload/upload',array('nameDierctory'=>"upload/user_$user_id/profile/"	, 'separate'	=>	'userProfile'	,	'user_id'	=>	$user_id)),
								   'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
								   'sizeLimit'=>1*1024*1024,// maximum file size in bytes
								   'minSizeLimit'=>100,// minimum file size in bytes
									'onComplete'=>"js:function(id, fileName, responseJSON){
										$('#thumb').attr('src','".Yii::app()->request->baseUrl."/upload/user_$user_id/profile/'+ responseJSON['filename']);
										}",
								   //'messages'=>array(
								   //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
								   //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
								   //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
								   //                  'emptyError'=>"{file} is empty, please select files again without it.",
								   //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
								   //                 ),
								   //'showMessage'=>"js:function(message){ alert(message); }"
								  )
				  ));
					  ?>
	
	<img src="<?php echo ($model->photo	!=	''	)	?	Yii::app()->request->baseUrl."/upload/user_$user_id/profile/".$model->photo	:	'';?>" id="thumb"	/>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->