<?php
$this->breadcrumbs=array(
	'User Informations',
);

$this->menu=array(
array('label'=>'Create UserInformation','url'=>array('create')),
array('label'=>'Manage UserInformation','url'=>array('admin')),
);
?>

<h1>User Informations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
