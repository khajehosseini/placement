<?php
$this->breadcrumbs=array(
	'Texams',
);

$this->menu=array(
array('label'=>'Create TExam','url'=>array('create')),
array('label'=>'Manage TExam','url'=>array('admin')),
);
?>

<h1>Texams</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
