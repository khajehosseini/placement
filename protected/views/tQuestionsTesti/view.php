<?php
$this->breadcrumbs=array(
	'Tquestions Testis'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List TQuestionsTesti','url'=>array('index')),
array('label'=>'Create TQuestionsTesti','url'=>array('create')),
array('label'=>'Update TQuestionsTesti','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TQuestionsTesti','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TQuestionsTesti','url'=>array('admin')),
);
?>

<h1>View TQuestionsTesti #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'lessonGroupCode.title',
		'choice_count',
		'title',
		'answer',
		'questionType.title',
		'unit',
		'time',
),
)); ?>
