<?php
$this->breadcrumbs=array(
	'Expert Lesson Assigns'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ExpertLessonAssign','url'=>array('index')),
array('label'=>'Create ExpertLessonAssign','url'=>array('create')),
array('label'=>'Update ExpertLessonAssign','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ExpertLessonAssign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ExpertLessonAssign','url'=>array('admin')),
);
?>

<h1>View ExpertLessonAssign #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'expertCode.title',
		'lessonGroupCode.title',
),
)); ?>
