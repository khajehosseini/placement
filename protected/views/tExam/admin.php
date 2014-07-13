<?php
$this->breadcrumbs=array(
	'Texams'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TExam','url'=>array('index')),
array('label'=>'Create TExam','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('texam-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Texams</h1>

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
$list_data	=	CHtml::listData(TLessonGroup::model()->findAll(),'id','title');
$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'texam-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(            
            'name'=>'lessonGroupCode.title',
			'filter'	=>	CHtml::activeDropDownList($model,'lesson_group_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'lesson_group_code'		
        ),
		'title',
		'testi_conut',
		'tashrihi_count',
		'status',
	
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
