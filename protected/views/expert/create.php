<?php
$this->breadcrumbs=array(
	'Experts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Expert','url'=>array('index')),
array('label'=>'Manage Expert','url'=>array('admin')),
);
?>

<h1>Create Expert</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>