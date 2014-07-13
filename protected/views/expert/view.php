<?php
$this->breadcrumbs=array(
	'Experts'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Expert','url'=>array('index')),
array('label'=>'Create Expert','url'=>array('create')),
array('label'=>'Update Expert','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Expert','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Expert','url'=>array('admin')),
);
?>

<h1>View Expert #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model->with('expertTypeCode'),
'attributes'=>array(
		'id',
		'expertTypeCode.title',
		'title',
),
)); ?>
