<?php

$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("ActivationMobile");
$this->breadcrumbs=array(
	UserModule::t("ActivationMoblie"),
);
?>
<h1><?php echo UserModule::t("ActivationMoblie"); ?></h1>
<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username') ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'moblie'); ?>
		<?php echo CHtml::activeTextField($model,'moblie') ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'activkeymoblie'); ?>
		<?php echo CHtml::activeTextField($model,'activkeymoblie') ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Run")); ?>
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->