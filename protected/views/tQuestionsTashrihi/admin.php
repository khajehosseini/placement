<?php
$this->breadcrumbs=array(
	'Tquestions Tashrihis'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TQuestionsTashrihi','url'=>array('index')),
array('label'=>'Create TQuestionsTashrihi','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tquestions-tashrihi-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Tquestions Tashrihis</h1>

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
$list_data_lesson_group	=	CHtml::listData(TLessonGroup::model()->findAll(),'id','title');
$list_data_question_type	=	CHtml::listData(TQuestionType::model()->findAll(),'id','title');


 $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'tquestions-tashrihi-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(            
            'name'=>'lessonGroupCode.title',
			'filter'	=>	CHtml::activeDropDownList($model,'lesson_group_code',$list_data_lesson_group ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'lesson_group_code'		
        ),
		'title',
		'answer',
		array(            
            'name'=>'questionType.title',
			'filter'	=>	CHtml::activeDropDownList($model,'question_type',$list_data_question_type ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'question_type'		
        ),
		'unit',
		/*
		'time',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
