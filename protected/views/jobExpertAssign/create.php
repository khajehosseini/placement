<?php
$this->breadcrumbs=array(
	'Job Expert Assigns'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JobExpertAssign','url'=>array('index')),
array('label'=>'Manage JobExpertAssign','url'=>array('admin')),
);
?>

<h1>Create JobExpertAssign</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model	,	'url'	=>	'expert')); ?>