<?php
$this->breadcrumbs=array(
	'Tquestions Tashrihis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TQuestionsTashrihi','url'=>array('index')),
array('label'=>'Manage TQuestionsTashrihi','url'=>array('admin')),
);
?>

<h1>Create TQuestionsTashrihi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>