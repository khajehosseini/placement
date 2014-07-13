<?php
$this->breadcrumbs=array(
	'Employe Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List EmployeOrder','url'=>array('index')),
array('label'=>'Create EmployeOrder','url'=>array('create')),
array('label'=>'Update EmployeOrder','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete EmployeOrder','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EmployeOrder','url'=>array('admin')),
);
?>

<h1>View EmployeOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'karfarma_user_code',
		'job_code',
		'expert_other',
		'skill_other',
		'sex',
		'memo',
		'expire_date',
		'create_date',
		'modified_date',
		'confirm_memo',
		'confirm_user_code',
		'confirm_date',
),
)); ?>
