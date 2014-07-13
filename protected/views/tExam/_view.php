<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('lesson_group_code')); ?>:</b>
	<?php echo CHtml::encode($data->lessonGroupCode->title); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('testi_conut')); ?>:</b>
	<?php echo CHtml::encode($data->testi_conut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tashrihi_count')); ?>:</b>
	<?php echo CHtml::encode($data->tashrihi_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />


</div>