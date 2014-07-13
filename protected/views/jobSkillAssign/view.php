<?php
$this->breadcrumbs=array(
	'Job Skill Assigns'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List JobSkillAssign','url'=>array('index')),
array('label'=>'Create JobSkillAssign','url'=>array('create')),
array('label'=>'Update JobSkillAssign','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete JobSkillAssign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JobSkillAssign','url'=>array('admin')),
);
?>

<h1>View JobSkillAssign #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'skillCode.title',
		'jobCode.title',
),
)); ?>
