<?php
$this->breadcrumbs=array(
	'Experts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Expert','url'=>array('index')),
	array('label'=>'Create Expert','url'=>array('create')),
	array('label'=>'View Expert','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Expert','url'=>array('admin')),
	);
	?>

	<h1>Update Expert <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>