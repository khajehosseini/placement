<?php
$this->breadcrumbs=array(
	'Expert Lesson Assigns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ExpertLessonAssign','url'=>array('index')),
	array('label'=>'Create ExpertLessonAssign','url'=>array('create')),
	array('label'=>'View ExpertLessonAssign','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ExpertLessonAssign','url'=>array('admin')),
	);
	?>

	<h1>Update ExpertLessonAssign <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model	,	'url'	=>	'../expert')); ?>