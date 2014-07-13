<?php
$this->breadcrumbs=array(
	'Tquestions Tashrihis'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TQuestionsTashrihi','url'=>array('index')),
	array('label'=>'Create TQuestionsTashrihi','url'=>array('create')),
	array('label'=>'View TQuestionsTashrihi','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TQuestionsTashrihi','url'=>array('admin')),
	);
	?>

	<h1>Update TQuestionsTashrihi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>