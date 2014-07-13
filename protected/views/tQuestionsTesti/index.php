<?php
$this->breadcrumbs=array(
	'Tquestions Testis',
);

$this->menu=array(
array('label'=>'Create TQuestionsTesti','url'=>array('create')),
array('label'=>'Manage TQuestionsTesti','url'=>array('admin')),
);
?>

<h1>Tquestions Testis</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
