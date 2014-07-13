<?php
$this->breadcrumbs=array(
	'Tquestions Tashrihis',
);

$this->menu=array(
array('label'=>'Create TQuestionsTashrihi','url'=>array('create')),
array('label'=>'Manage TQuestionsTashrihi','url'=>array('admin')),
);
?>

<h1>Tquestions Tashrihis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
