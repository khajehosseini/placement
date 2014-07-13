<?php
$this->breadcrumbs=array(
	'Job Expert Assigns',
);

$this->menu=array(
array('label'=>'Create JobExpertAssign','url'=>array('create')),
array('label'=>'Manage JobExpertAssign','url'=>array('admin')),
);
?>

<h1>Job Expert Assigns</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
