<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php	
			$list_data	=	CHtml::listData(Country::model()->findAll(),'id','title');
			echo $form->dropDownListRow($model,'country_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
		?>
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
