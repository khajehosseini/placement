<?php
$this->breadcrumbs=array(
	'Experts',
);

$this->menu=array(
array('label'=>'Create Expert','url'=>array('create')),
array('label'=>'Manage Expert','url'=>array('admin')),
);
?>

<h1>Experts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
