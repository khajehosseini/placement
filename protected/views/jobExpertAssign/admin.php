<?php
$this->breadcrumbs=array(
	'Job Expert Assigns'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List JobExpertAssign','url'=>array('index')),
array('label'=>'Create JobExpertAssign','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('job-expert-assign-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Job Expert Assigns</h1>

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

<?php 
$list_data_expert	=	CHtml::listData(Expert::model()->findAll(),'id','title');
$list_data_job	=	CHtml::listData(Jobs::model()->findAll(),'id','title');

$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'job-expert-assign-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(            
            'name'=>'expertCode.title',
			'filter'	=>	CHtml::activeDropDownList($model,'expert_code',$list_data_expert ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'Expert'
			
        ),
			array(            
            'name'=>'jobCode.title',
			'filter'	=>	CHtml::activeDropDownList($model,'job_code',$list_data_expert ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'JOBCODE'
			
        ),

array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
