<?php
/* @var $this UserInformationController */
/* @var $model UserInformation */
?>
<script>
	$(document).ready(function(){
	
		$('#uploadFileScans').click(function(e){
			var		scanType	=	$('#scanType').attr('value');
			if(scanType	==	''){
				alert('لطفا نوع اسکن را انتخاب کنید');
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
<div class="form">
<table  class="items table"  style="float: right; text-align: right; direction: rtl;">
	<thead>
	<tr>
		<th>نوع اسکن</th>
		<th>
			<?php	
			$list_data	=	CHtml::listData(UploadType::model()->findAll(),'id','title');
			echo $form->dropDownList($model,'upload_type_code'	,	$list_data	,	array(	'id'	=>	'scanType'	,		'empty'	=>'لطفا انتخاب کنید')); ?></th>
		<th><?php	
			$user_id	=	Yii::app()->user->id;
			if( !is_dir( "upload/user_$user_id/scans")){
				mkdir("upload/user_$user_id/scans");
			}
			$this->widget('ext.EAjaxUpload.EAjaxUpload',
			 array(
				   'id'=>'uploadFileScans',
				   'postParams'=>array('scanType'=>'js:function(){ return $(\'#scanType\').attr(\'value\');}'),
				   'config'=>array(
								   'action'=>Yii::app()->createUrl('upload/upload',array('farhade'=>'js:var 1+1 ;','nameDierctory'=>"upload/user_$user_id/scans/"	, 'separate'	=>	'userScansGenerate'	,	'user_id'	=>	"$user_id" 	)),
								    'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
								   'sizeLimit'=>10*1024*1024,// maximum file size in bytes
								   'minSizeLimit'=>100,// minimum file size in bytes
									'onComplete'=>"js:function(){
											$('#detail').load('".Yii::app()->createUrl('upload/scanedfiledetaillist')."');
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
		  ?></th>
	</tr>

</table>
<div id="detail"> 
	<?php	$uploads	=	Upload::model()->with('uploadTypeCode')->findAll(array('condition'	=>	"user_code=$user_id"	,'order'	=>	't.id desc'	));
	?>
	<table style="float: right; text-align: right; direction: rtl;" class="items table">
	<?php	if(!empty($uploads)){
	?>
		<tr>
			<th>نام فايل</th>	
			<th>نوع فايل</th>
			<th>عمليات</th>
		</tr>
	<?php
				foreach	($uploads	as	$dataObj){
		?>	
		<tr id="row-<?php echo $dataObj->id;	?>">
			<td><a href="/upload/user_<?php echo $user_id;	?>/scans/<?php	echo	$dataObj->filename;?>" target="_blank"><?php	echo	$dataObj->filename;?></a></td>
			<td><?php	echo	$dataObj->uploadTypeCode->title;?></td>
			<td><?php	echo	CHtml::ajaxLink('حذف',Yii::app()->createUrl('upload/deletefileupload')	,	array(	
																													'data'			=>	array(	'id'	=>	$dataObj->id	,	'directoryName'	=>		"upload/user_$user_id/scans/")	,
																													'success'	=>	"js:function(){
																																						$('#row-".$dataObj->id."').remove();
																																				}"
																												)
																										
																												);?></td>
		</tr>
	<?php	}	?>
	<?php	}	?>
</table>	

</div>
<?php $this->endWidget(); ?>

</div><!-- form -->