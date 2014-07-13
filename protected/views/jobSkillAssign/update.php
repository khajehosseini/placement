<?php
$this->breadcrumbs=array(
	'Job Skill Assigns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JobSkillAssign','url'=>array('index')),
	array('label'=>'Create JobSkillAssign','url'=>array('create')),
	array('label'=>'View JobSkillAssign','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage JobSkillAssign','url'=>array('admin')),
	);
	?>

	<h1>Update JobSkillAssign <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model	,	'url'	=>	'../skill')); ?>