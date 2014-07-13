<?php
$this->breadcrumbs=array(
	'User Informations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List UserInformation','url'=>array('index')),
array('label'=>'Manage UserInformation','url'=>array('admin')),
);
?>

<h1>Create UserInformation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>