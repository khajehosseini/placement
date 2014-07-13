<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'karfarma_user_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'job_code',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'expert_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'skill_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'sex',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'expire_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'create_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'modified_date',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'confirm_memo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'confirm_user_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'confirm_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
