<?php
$this->breadcrumbs=array(
	'Skill Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SkillType','url'=>array('index')),
array('label'=>'Manage SkillType','url'=>array('admin')),
);
?>

<h1>Create SkillType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>