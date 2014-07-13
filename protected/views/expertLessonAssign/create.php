<?php
$this->breadcrumbs=array(
	'Expert Lesson Assigns'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ExpertLessonAssign','url'=>array('index')),
array('label'=>'Manage ExpertLessonAssign','url'=>array('admin')),
);
?>

<h1>Create ExpertLessonAssign</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model	,	'url'	=>	'expert'	)); ?>