<?php
$this->breadcrumbs=array(
	'Tquestions Testis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TQuestionsTesti','url'=>array('index')),
array('label'=>'Manage TQuestionsTesti','url'=>array('admin')),
);
?>

<h1>Create TQuestionsTesti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>