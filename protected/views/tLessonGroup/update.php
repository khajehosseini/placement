<?php
$this->breadcrumbs=array(
	'Tlesson Groups'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TLessonGroup','url'=>array('index')),
	array('label'=>'Create TLessonGroup','url'=>array('create')),
	array('label'=>'View TLessonGroup','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TLessonGroup','url'=>array('admin')),
	);
	?>

	<h1>Update TLessonGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>