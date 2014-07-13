<?php
$this->breadcrumbs=array(
	'Job Expert Assigns'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List JobExpertAssign','url'=>array('index')),
array('label'=>'Create JobExpertAssign','url'=>array('create')),
array('label'=>'Update JobExpertAssign','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete JobExpertAssign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JobExpertAssign','url'=>array('admin')),
);
?>

<h1>View JobExpertAssign #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'expertCode.title',
		'jobCode.title',
),
)); ?>
