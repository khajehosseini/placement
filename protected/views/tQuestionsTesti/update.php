<?php
$this->breadcrumbs=array(
	'Tquestions Testis'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TQuestionsTesti','url'=>array('index')),
	array('label'=>'Create TQuestionsTesti','url'=>array('create')),
	array('label'=>'View TQuestionsTesti','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TQuestionsTesti','url'=>array('admin')),
	);
	?>

	<h1>Update TQuestionsTesti <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>