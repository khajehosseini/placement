<?php
$this->breadcrumbs=array(
	'Job Skill Assigns'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JobSkillAssign','url'=>array('index')),
array('label'=>'Manage JobSkillAssign','url'=>array('admin')),
);
?>

<h1>Create JobSkillAssign</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model		,	'url'	=>	'skill')); ?>