<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php	
			$list_data	=	CHtml::listData(TLessonGroup::model()->findAll(),'id','title');
			echo $form->dropDownListRow($model,'lesson_group_code',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
		?>	

		<?php echo $form->textAreaRow($model,'title',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'answer',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
		
		<?php	
			$list_data	=	CHtml::listData(TQuestionType::model()->findAll(),'id','title');
			echo $form->dropDownListRow($model,'question_type',$list_data ,	array('empty'	=>	'لطفا انتخاب کنيد'	,	'class'=>'span5')	);
		?>	

		<?php echo $form->textFieldRow($model,'unit',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
