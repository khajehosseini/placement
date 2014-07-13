<?php
$this->breadcrumbs=array(
	'Expert Lesson Assigns',
);

$this->menu=array(
array('label'=>'Create ExpertLessonAssign','url'=>array('create')),
array('label'=>'Manage ExpertLessonAssign','url'=>array('admin')),
);
?>

<h1>Expert Lesson Assigns</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
