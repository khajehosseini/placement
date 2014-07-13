<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('karfarma_user_code')); ?>:</b>
	<?php echo CHtml::encode($data->karfarma_user_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_code')); ?>:</b>
	<?php echo CHtml::encode($data->job_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expert_other')); ?>:</b>
	<?php echo CHtml::encode($data->expert_other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill_other')); ?>:</b>
	<?php echo CHtml::encode($data->skill_other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memo')); ?>:</b>
	<?php echo CHtml::encode($data->memo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('expire_date')); ?>:</b>
	<?php echo CHtml::encode($data->expire_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirm_memo')); ?>:</b>
	<?php echo CHtml::encode($data->confirm_memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirm_user_code')); ?>:</b>
	<?php echo CHtml::encode($data->confirm_user_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirm_date')); ?>:</b>
	<?php echo CHtml::encode($data->confirm_date); ?>
	<br />

	*/ ?>

</div>