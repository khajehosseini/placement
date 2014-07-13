<?php
$this->breadcrumbs=array(
	'Tquestions Tashrihis'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List TQuestionsTashrihi','url'=>array('index')),
array('label'=>'Create TQuestionsTashrihi','url'=>array('create')),
array('label'=>'Update TQuestionsTashrihi','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TQuestionsTashrihi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TQuestionsTashrihi','url'=>array('admin')),
);
?>

<h1>View TQuestionsTashrihi #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'lessonGroupCode.title',

		'title',
		'answer',
		'questionType.title',

		'unit',
		'time',
),
)); ?>
