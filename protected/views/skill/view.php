<?php
$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Skill','url'=>array('index')),
array('label'=>'Create Skill','url'=>array('create')),
array('label'=>'Update Skill','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Skill','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Skill','url'=>array('admin')),
);
?>

<h1>View Skill #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model->with('skillTypeCode'),
'attributes'=>array(
		'id',
		'skillTypeCode.title',
		'title',
),
)); ?>
