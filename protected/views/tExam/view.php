<?php
$this->breadcrumbs=array(
	'Texams'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List TExam','url'=>array('index')),
array('label'=>'Create TExam','url'=>array('create')),
array('label'=>'Update TExam','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TExam','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TExam','url'=>array('admin')),
);
?>

<h1>View TExam #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
		'lessonGroupCode.title',
		'testi_conut',
		'tashrihi_count',
		'status',
		'create_date',
),
)); ?>
