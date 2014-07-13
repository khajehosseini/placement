<?php
$this->breadcrumbs=array(
	'Tlesson Groups'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TLessonGroup','url'=>array('index')),
array('label'=>'Manage TLessonGroup','url'=>array('admin')),
);
?>

<h1>Create TLessonGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>