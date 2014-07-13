<?php
$this->breadcrumbs=array(
	'Employe Orders',
);

$this->menu=array(
array('label'=>'Create EmployeOrder','url'=>array('create')),
array('label'=>'Manage EmployeOrder','url'=>array('admin')),
);
?>

<h1>Employe Orders</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
