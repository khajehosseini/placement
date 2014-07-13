<?php
$this->breadcrumbs=array(
	'Skill Types',
);

$this->menu=array(
array('label'=>'Create SkillType','url'=>array('create')),
array('label'=>'Manage SkillType','url'=>array('admin')),
);
?>

<h1>Skill Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
