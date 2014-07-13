<table style="float: right; text-align: right; direction: rtl;" class="items table">
	<?php	if(!empty($uploads)){
		$user_id	=	Yii::app()->user->id;
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
			<td><?php	echo	CHtml::ajaxLink('حذف',Yii::app()->createUrl('upload/deletefileupload')	,
								array(	'data'	=>
													array(	'id'	=>	$dataObj->id,	'directoryName'	=>		"upload/user_$user_id/scans/")
										,'success'	=>	"js:function(){	$('#row-".$dataObj->id."').remove();}"		
									));?></td>
		</tr>
	<?php	}	?>
	<?php	}	?>
</table>	