<?php
$this->breadcrumbs=array(
	'Expert Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ExpertType','url'=>array('index')),
array('label'=>'Manage ExpertType','url'=>array('admin')),
);
?>

<h1>Create ExpertType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>