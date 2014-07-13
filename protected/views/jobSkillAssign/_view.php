<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_code')); ?>:</b>
	<?php echo CHtml::encode($data->skillCode->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_code')); ?>:</b>
	<?php echo CHtml::encode($data->jobCode->title); ?>
	<br />


</div>