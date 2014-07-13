<?php
$this->breadcrumbs=array(
	'Tlesson Groups'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List TLessonGroup','url'=>array('index')),
array('label'=>'Create TLessonGroup','url'=>array('create')),
array('label'=>'Update TLessonGroup','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TLessonGroup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TLessonGroup','url'=>array('admin')),
);
?>

<h1>View TLessonGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
),
)); ?>
