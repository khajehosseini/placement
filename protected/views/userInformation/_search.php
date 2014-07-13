<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'birth_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'sex',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'meli_num',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'marrie_status',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'photo',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textAreaRow($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'state_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'city_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'zone',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'personnel_count',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'act_history',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'act_type',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'education_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'elementary_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'low_school_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'high_school_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'university_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'certification_num',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'certification_date',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'resume_act',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'favorite',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'expert_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'skill_other',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'religion_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'religion_other',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'confirm',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'reason',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'confirm_user_code',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'payment_status',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
