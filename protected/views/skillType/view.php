<?php
$this->breadcrumbs=array(
	'Skill Types'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List SkillType','url'=>array('index')),
array('label'=>'Create SkillType','url'=>array('create')),
array('label'=>'Update SkillType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete SkillType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SkillType','url'=>array('admin')),
);
?>

<h1>View SkillType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
),
)); ?>
