<?php
/* @var $this FtontendController */

$this->pageTitle=Yii::app()->name . ' -Home';
$this->breadcrumbs=array(' ');
?>
<?php	echo CHtml::link('ثبت نام کارجو'	,	$this->createUrl('frontend/Iduser/2')
		,	array(	'class'	=>	'btn btn-primary'	));	?>
<hr>
<?php	echo CHtml::link('ثبت نام کارفرما'	,	$this->createUrl('frontend/Iduser/3')
		,	array(	'class'	=>	'btn btn-primary'	));	?>
<hr>