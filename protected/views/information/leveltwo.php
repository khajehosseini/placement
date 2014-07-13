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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'personnel_count'); ?>
		<?php echo $form->textField($model,'personnel_count'); ?>
		<?php echo $form->error($model,'personnel_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'act_history'); ?>
		<?php echo $form->textField($model,'act_history'); ?>
		<?php echo $form->error($model,'act_history'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'act_type'); ?>
		<?php echo $form->textField($model,'act_type'); ?>
		<?php echo $form->error($model,'act_type'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->