<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('/user'),
	UserModule::t('ManageUser'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><?php echo UserModule::t("Manage Users Customize"); ?></h1>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search_manage_user',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		
		array(
			'type'		=>	'raw',
			'header'	=>	'levelOne',
			//'value'		=>	'CHtml::link(CHtml::encode("levelOne"),array("/information/levelone","id"=>$data->id))'
			'value' 	=> 'CHtml::link(CHtml::encode("levelOne"),array("/information/levelone","id"=>$data->id))',
		),
	
		array(
			'type'		=>	'raw',
			'header'	=>	'levelTwo',			
			'value' => 'CHtml::link(CHtml::encode("levelTwo"),array("/information/leveltwo","id"=>$data->id))',
		),
		array(
			'type'		=>	'raw',
			'header'	=>	'levelThree',			
			'value' => 'CHtml::link(CHtml::encode("levelThree"),array("/information/levelthree","id"=>$data->id))',
		),
		array(
			'type'		=>	'raw',
			'header'	=>	'levelFour',			
			'value' => 'CHtml::link(CHtml::encode("levelFour"),array("/information/levelfour","id"=>$data->id))',
		),
		array(
			'type'		=>	'raw',
			'header'	=>	'levelFive',			
			'value' => 'CHtml::link(CHtml::encode("levelFive"),array("/information/levelfive","id"=>$data->id))',
		),
		array(
			'type'		=>	'raw',
			'header'	=>	'levelsix',			
			'value' => 'CHtml::link(CHtml::encode("levelsix"),array("/information/levelsix","id"=>$data->id))',
		),
		array(
			'type'		=>	'raw',
			'header'	=>	'levelSeven',			
			'value' => 'CHtml::link(CHtml::encode("levelSeven"),array("/information/levelSeven","id"=>$data->id))',
		),
	),
)); ?>
