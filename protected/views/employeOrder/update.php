<?php
$this->breadcrumbs=array(
	'Employe Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EmployeOrder','url'=>array('index')),
	array('label'=>'Create EmployeOrder','url'=>array('create')),
	array('label'=>'View EmployeOrder','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage EmployeOrder','url'=>array('admin')),
	);
	?>

	<h1>Update EmployeOrder <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>