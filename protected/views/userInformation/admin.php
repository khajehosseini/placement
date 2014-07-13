<?php
$this->breadcrumbs=array(
	'User Informations'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List UserInformation','url'=>array('index')),
array('label'=>'Create UserInformation','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('user-information-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage User Informations</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-information-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'birth_date',
		'sex',
		'email',
		'meli_num',
		'marrie_status',
		/*
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
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
