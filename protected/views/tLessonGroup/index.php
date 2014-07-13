<?php
$this->breadcrumbs=array(
	'Tlesson Groups',
);

$this->menu=array(
array('label'=>'Create TLessonGroup','url'=>array('create')),
array('label'=>'Manage TLessonGroup','url'=>array('admin')),
);
?>

<h1>Tlesson Groups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
