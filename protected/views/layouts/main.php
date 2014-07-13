<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/frontend/index')),
				array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Profile', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'levelOne', 'url'=>array('/information/levelone'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),
				array('label'=>'levelTwo', 'url'=>array('/information/leveltwo'), 'visible'=>Yii::app()->user->checkAccess('karfarma_role')),
				array('label'=>'levelThree', 'url'=>array('/information/levelthree'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),
				array('label'=>'levelFour', 'url'=>array('/information/levelfour'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),	
				array('label'=>'levelFive', 'url'=>array('/information/levelfive'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),	
				array('label'=>'levelSex', 'url'=>array('/information/levelsix'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),	
				array('label'=>'levelSeven', 'url'=>array('/information/levelseven'), 'visible'=>(Yii::app()->user->checkAccess('karjo_role') OR Yii::app()->user->checkAccess('karfarma_role'))),	
				array('label'=>'ExpertType', 'url'=>array('/expertType/index'), 'visible'=>Yii::app()->user->checkAccess('ExpertType.*')),
				array('label'=>'Expert', 'url'=>array('/expert/index'), 'visible'=>Yii::app()->user->checkAccess('Expert.*')),	
				array('label'=>'SkillType', 'url'=>array('/skillType/index'),'visible'=>Yii::app()->user->checkAccess('SkillType.*')),
				array('label'=>'Skill', 'url'=>array('/skill/index'), 'visible'=>Yii::app()->user->checkAccess('Skill.*')),
				array('label'=>'Education', 'url'=>array('/education/index'), 'visible'=>Yii::app()->user->checkAccess('Education.*')),					
				array('label'=>'Country', 'url'=>array('/country/index'), 'visible'=>Yii::app()->user->checkAccess('Country.*')),					
				array('label'=>'State', 'url'=>array('/state/index'), 'visible'=>Yii::app()->user->checkAccess('State.*')),					
				array('label'=>'City', 'url'=>array('/city/index'), 'visible'=>Yii::app()->user->checkAccess('City.*')),		
				array('label'=>'ManageUser', 'url'=>array('/user/admin/manageuser'), 'visible'=>Yii::app()->user->checkAccess('User.Admin.ManageUser')),	
				array('label'=>'tLessonGroup', 'url'=>array('/tLessonGroup'), 'visible'=>Yii::app()->user->checkAccess('TLessonGroup.*')),	
				array('label'=>'tExam', 'url'=>array('/tExam'), 'visible'=>Yii::app()->user->checkAccess('TExam.*')),	
				array('label'=>'tQuestionsTashrihi', 'url'=>array('/tQuestionsTashrihi'), 'visible'=>Yii::app()->user->checkAccess('TQuestionsTashrihi.*')),	
				array('label'=>'tQuestionsTesti', 'url'=>array('/tQuestionsTesti'), 'visible'=>Yii::app()->user->checkAccess('TQuestionsTesti.*')),	

				
				array('label'=>'jobs', 'url'=>array('/jobs'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'expertLessonAssign', 'url'=>array('/expertLessonAssign'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'JobExpertAssign', 'url'=>array('/jobExpertAssign'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'jobSkillAssign', 'url'=>array('/jobSkillAssign'), 'visible'=>!Yii::app()->user->isGuest),
				
				array('label'=>'employeOrder', 'url'=>array('/employeOrder'), 'visible'=>!Yii::app()->user->isGuest),
				
				
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'ActivationMoblie', 'url'=>array('/user/activation/ActivationMoblie')	, 'visible'=>Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
