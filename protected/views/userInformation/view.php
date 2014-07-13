<?php
$this->breadcrumbs=array(
	'User Informations'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List UserInformation','url'=>array('index')),
array('label'=>'Create UserInformation','url'=>array('create')),
array('label'=>'Update UserInformation','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete UserInformation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage UserInformation','url'=>array('admin')),
);
?>

<h1>View UserInformation #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'birth_date',
		'sex',
		'email',
		'meli_num',
		'marrie_status',
		'photo',
		'address',
		'state_code',
		'city_code',
		'zone',
		'telephone',
		'personnel_count',
		'act_history',
		'act_type',
		'education_code',
		'elementary_name',
		'low_school_name',
		'high_school_name',
		'university_name',
		'certification_num',
		'certification_date',
		'resume_act',
		'favorite',
		'expert_other',
		'skill_other',
		'religion_code',
		'religion_other',
		'confirm',
		'reason',
		'confirm_user_code',
		'payment_status',
),
)); ?>
