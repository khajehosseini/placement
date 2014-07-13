<?php
$this->breadcrumbs=array(
	'Expert Types'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List ExpertType','url'=>array('index')),
array('label'=>'Create ExpertType','url'=>array('create')),
array('label'=>'Update ExpertType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ExpertType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ExpertType','url'=>array('admin')),
);
?>

<h1>View ExpertType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
),
)); ?>
