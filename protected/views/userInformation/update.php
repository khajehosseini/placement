<?php
$this->breadcrumbs=array(
	'User Informations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List UserInformation','url'=>array('index')),
	array('label'=>'Create UserInformation','url'=>array('create')),
	array('label'=>'View UserInformation','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage UserInformation','url'=>array('admin')),
	);
	?>

	<h1>Update UserInformation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>