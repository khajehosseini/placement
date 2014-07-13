<?php
$this->breadcrumbs=array(
	'Job Skill Assigns',
);

$this->menu=array(
array('label'=>'Create JobSkillAssign','url'=>array('create')),
array('label'=>'Manage JobSkillAssign','url'=>array('admin')),
);
?>

<h1>Job Skill Assigns</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
