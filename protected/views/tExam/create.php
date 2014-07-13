<?php
$this->breadcrumbs=array(
	'Texams'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TExam','url'=>array('index')),
array('label'=>'Manage TExam','url'=>array('admin')),
);
?>

<h1>Create TExam</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>