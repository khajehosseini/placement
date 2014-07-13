<?php
$this->breadcrumbs=array(
	'Texams'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TExam','url'=>array('index')),
	array('label'=>'Create TExam','url'=>array('create')),
	array('label'=>'View TExam','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TExam','url'=>array('admin')),
	);
	?>

	<h1>Update TExam <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>