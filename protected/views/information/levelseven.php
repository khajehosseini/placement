<?php
/* @var $this UserInformationController */
/* @var $model UserInformation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-information-UserInformation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	
	<div class="row"> 
		<?php echo $form->labelEx($model,'resume_act'); ?>
		<?php echo $form->textArea($model,'resume_act'); ?>
		<?php echo $form->error($model,'resume_act'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'favorite'); ?>
		<?php echo $form->textArea($model,'favorite'); ?>
		<?php echo $form->error($model,'favorite'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->