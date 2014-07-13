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
		<?php echo $form->labelEx($model,'education_code'); ?> 
		<?php	
			$list_data	=	CHtml::listData(Education::model()->findAll(),'id','title');
			echo $form->dropDownList($model,'education_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد')	);
		?>
		<?php echo $form->error($model,'education_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elementary_name'); ?>
		<?php echo $form->textField($model,'elementary_name'); ?>
		<?php echo $form->error($model,'elementary_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'low_school_name'); ?>
		<?php echo $form->textField($model,'low_school_name'); ?>
		<?php echo $form->error($model,'low_school_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'high_school_name'); ?>
		<?php echo $form->textField($model,'high_school_name'); ?>
		<?php echo $form->error($model,'high_school_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_name'); ?>
		<?php echo $form->textField($model,'university_name'); ?>
		<?php echo $form->error($model,'university_name'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->