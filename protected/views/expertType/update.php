<?php
$this->breadcrumbs=array(
	'Expert Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ExpertType','url'=>array('index')),
	array('label'=>'Create ExpertType','url'=>array('create')),
	array('label'=>'View ExpertType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ExpertType','url'=>array('admin')),
	);
	?>

	<h1>Update ExpertType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>