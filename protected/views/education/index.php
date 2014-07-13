<?php
$this->breadcrumbs=array(
	'Educations',
);

$this->menu=array(
array('label'=>'Create Education','url'=>array('create')),
array('label'=>'Manage Education','url'=>array('admin')),
);
?>

<h1>Educations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
