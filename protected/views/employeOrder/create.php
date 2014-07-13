<?php
$this->breadcrumbs=array(
	'Employe Orders'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EmployeOrder','url'=>array('index')),
array('label'=>'Manage EmployeOrder','url'=>array('admin')),
);
?>

<h1>Create EmployeOrder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>