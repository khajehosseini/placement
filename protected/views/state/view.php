<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List State','url'=>array('index')),
array('label'=>'Create State','url'=>array('create')),
array('label'=>'Update State','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete State','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage State','url'=>array('admin')),
);
?>

<h1>View State #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model->with('countryCode'),
'attributes'=>array(
		'id',
		'countryCode.title',
		'title',
),
)); ?>
