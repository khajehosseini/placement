<?php
$this->breadcrumbs=array(
	'Tquestions Testis'=>array('index'),'Tquestions Testis Manage'=>array('admin')
	
);
?>
<form  action="" method="post">
<h1>View TQuestionsTesti Choice #<?php echo$questionID	; ?></h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'dataProvider'=>$model->search($questionID),
'columns'=>array(
		'number',
		array(  
       		'name' => 'title',
			'type'=>'raw',
			'value' => 'CHtml::textField("title[$data->id]" ,$data->title)',
        ),
),
)); ?>
	<?php echo CHtml::hiddenField('questionID'	,	$questionID		);
	echo CHtml::ajaxSubmitButton('ثبت و ویرایش'	,	'updateyourchoiceajax');	?>
</form>


