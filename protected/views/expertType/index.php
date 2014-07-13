<?php
$this->breadcrumbs=array(
	'Expert Types',
);

$this->menu=array(
array('label'=>'Create ExpertType','url'=>array('create')),
array('label'=>'Manage ExpertType','url'=>array('admin')),
);
?>

<h1>Expert Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
