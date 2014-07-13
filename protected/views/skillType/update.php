<?php
$this->breadcrumbs=array(
	'Skill Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SkillType','url'=>array('index')),
	array('label'=>'Create SkillType','url'=>array('create')),
	array('label'=>'View SkillType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage SkillType','url'=>array('admin')),
	);
	?>

	<h1>Update SkillType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>