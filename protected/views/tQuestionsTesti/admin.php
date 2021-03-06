<?php
$this->breadcrumbs=array(
	'Tquestions Testis'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TQuestionsTesti','url'=>array('index')),
array('label'=>'Create TQuestionsTesti','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tquestions-testi-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Tquestions Testis</h1>

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
'id'=>'tquestions-testi-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(            
            'name'=>'lessonGroupCode.title',
			'filter'	=>	CHtml::activeDropDownList($model,'lesson_group_code',$list_data_lesson_group ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'lesson_group_code'		
        ),
		'choice_count',
		'title',
		'answer',
		array(            
            'name'=>'questionType.title',
			'filter'	=>	CHtml::activeDropDownList($model,'question_type',$list_data_question_type ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')),
			'header'	=>	'question_type'		
        ),
		array(  
        	'header'	=>	'choiceLink',
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode("ثبت و ویرایش گزینه ها"),array("UpdateYourChoice","questionID"=>$data->id))',
        ),
		/*
		'unit',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
