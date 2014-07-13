<?php
	class InformationController extends RController
	{
		/**
		* @return array action filters
		*/
		public function filters()
		{
		return array(
		'accessControl', // perform access control for CRUD operations
		'rights'
		);
		}
		
		/**
		* Displays general information  .
		*/
		public function actionLevelOne(){
			if(	!isset(Yii::app()->session['check_url'])	){
				Yii::app()->session['refer_url']	=	isset($_SERVER['HTTP_REFERER'])	?	$_SERVER['HTTP_REFERER']	:	Yii::app()->session['refer_url'];
				Yii::app()->session['check_url']	=	strpos(Yii::app()->session['refer_url']	,	'manageuser');
			}
		
			if(Yii::app()->session['check_url']!==	FALSE)
				$user_id	=	$_GET['id'];
			else
				$user_id	=	Yii::app()->user->id;
			$model=UserInformation::model()->findByPk($user_id);
			
			// uncomment the following code to enable ajax-based validation
			/*
			if(isset($_POST['ajax']) && $_POST['ajax']==='user-information-UserInformation-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			*/		
			if(isset($_POST['UserInformation']))
			{
				$model->attributes=$_POST['UserInformation'];
				if($model->validate())
				{
					// form inputs are valid, do something here
					$model->scenario='levelone';
					$model->birth_date		=	($model->birth_date	==	'--')	?	0	:	0;	//jalali_to_gergorian_string($model->birth_date);
					$model->updateAll($model ,"id=:id",array(':id'	=>	$user_id) ); // save the change to database
					if(Yii::app()->session['check_url']	!==	FALSE){
						$this->redirect(Yii::app()->session['refer_url']);
					}
				}
			}
			$this->render('levelone',array('model'=>$model));
		}
		/**
		* Displays karfarma information(about activity type and activity history )  .
		*/
		public function actionLevelTwo(){
			
			if(	!isset(Yii::app()->session['check_url'])	){
				Yii::app()->session['refer_url']	=	isset($_SERVER['HTTP_REFERER'])	?	$_SERVER['HTTP_REFERER']	:	Yii::app()->session['refer_url'];
				Yii::app()->session['check_url']	=	strpos(Yii::app()->session['refer_url']	,	'manageuser');
			}
		
			if(Yii::app()->session['check_url']!==	FALSE)
				$user_id	=	$_GET['id'];
			else
				$user_id	=	Yii::app()->user->id;
				
			   $model=UserInformation::model()->findByPk($user_id);

				// uncomment the following code to enable ajax-based validation
				/*
				if(isset($_POST['ajax']) && $_POST['ajax']==='user-information-UserInformation-form')
				{
					echo CActiveForm::validate($model);
					Yii::app()->end();
				}
				*/

				if(isset($_POST['UserInformation']))
				{
					$model->attributes=$_POST['UserInformation'];
					if($model->validate())
					{
						// form inputs are valid, do something here
						$model->scenario='leveltwo';
						$model->updateAll($model	,"id=:id",array(':id'	=>	$user_id)	); // save the change to database
						if(Yii::app()->session['check_url']	!==	FALSE){
							$this->redirect(Yii::app()->session['refer_url']);
						}
					}
				}
				$this->render('leveltwo',array('model'=>$model));
		}
		/**
		* Displays education information.
		*/
		public function actionLevelThree(){
			if(	!isset(Yii::app()->session['check_url'])	){
				Yii::app()->session['refer_url']	=	isset($_SERVER['HTTP_REFERER'])	?	$_SERVER['HTTP_REFERER']	:	Yii::app()->session['refer_url'];
				Yii::app()->session['check_url']	=	strpos(Yii::app()->session['refer_url']	,	'manageuser');
			}
		
			if(Yii::app()->session['check_url']!==	FALSE)
				$user_id	=	$_GET['id'];
			else
				$user_id	=	Yii::app()->user->id;
			
			$model=UserInformation::model()->findByPk($user_id);

			// uncomment the following code to enable ajax-based validation
			/*
			if(isset($_POST['ajax']) && $_POST['ajax']==='user-information-UserInformation-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			*/

			if(isset($_POST['UserInformation']))
			{
				$model->attributes=$_POST['UserInformation'];
				if($model->validate())
				{
					// form inputs are valid, do something here
					$model->scenario='levelthree';
					$model->updateAll($model ,"id=:id",array(':id'	=>	$user_id)	); // save the change to database
					if(Yii::app()->session['check_url']	!==	FALSE){
							$this->redirect(Yii::app()->session['refer_url']);
					}
				}
			}
			$this->render('levelthree',array('model'=>$model));
		}
		/**
		* Displays Scan file information ( include : last certifacte elementray school).
		*/
		public function actionLevelFour(){
			$model=Upload::model();
			$this->render('levelfour',array('model'=>$model));
		}
		
		/**
		* Displays experts for user .
		*/
		public function actionLevelFive(){
			if(	!isset(Yii::app()->session['check_url'])	){
				Yii::app()->session['refer_url']	=	isset($_SERVER['HTTP_REFERER'])	?	$_SERVER['HTTP_REFERER']	:	Yii::app()->session['refer_url'];
				Yii::app()->session['check_url']	=	strpos(Yii::app()->session['refer_url']	,	'manageuser');
			}
		
			if(Yii::app()->session['check_url']!==	FALSE)
				$user_id	=	$_GET['id'];
			else
				$user_id	=	Yii::app()->user->id;
				
			$modelUserInformation=UserInformation::model()->findByPk($user_id)->with('userExpert');
			$model		=	new UserExpert('search');
			$this->render('levelfive',array(	'model'=> $model,	'modelUserInformation'	=>	$modelUserInformation	,	'user_id'	=>	$user_id	));
		}
		
		/**
		* Displays experts for user .
		*/
		public function actionLevelSix(){
			$modelUserInformation=UserInformation::model()->findByPk(Yii::app()->user->id);
			$model=new UserSkill('search');
			$this->render('levelsix',array(
			'model'=>$model,	'modelUserInformation'	=>	$modelUserInformation
			));
		}
		
				/**
		* Displays resume information.
		*/
		public function actionLevelSeven(){
			if(	!isset(Yii::app()->session['check_url'])	){
				Yii::app()->session['refer_url']	=	isset($_SERVER['HTTP_REFERER'])	?	$_SERVER['HTTP_REFERER']	:	Yii::app()->session['refer_url'];
				Yii::app()->session['check_url']	=	strpos(Yii::app()->session['refer_url']	,	'manageuser');
			}
		
			if(Yii::app()->session['check_url']!==	FALSE)
				$user_id	=	$_GET['id'];
			else
				$user_id	=	Yii::app()->user->id;
			
			$model=UserInformation::model()->findByPk($user_id);

			// uncomment the following code to enable ajax-based validation
			/*
			if(isset($_POST['ajax']) && $_POST['ajax']==='user-information-UserInformation-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			*/

			if(isset($_POST['UserInformation']))
			{
				$model->attributes=$_POST['UserInformation'];
				if($model->validate())
				{
					// form inputs are valid, do something here
					$model->scenario='levelseven';
					$model->updateAll($model	,"id=:id",array(':id'	=>	$user_id)	); // save the change to database
					
					if(Yii::app()->session['check_url']	!==	FALSE){
							$this->redirect(Yii::app()->session['refer_url']);
					}
				}
			}
			$this->render('levelseven',array('model'=>$model));
		}
		/**
		* Displays cities , use in ajax comnbo state  .
		*/
		public function actionCity()
		{	
			$data=City::model()->findAll('state_code=:state_id',  array(':state_id'=> $_POST['state_id']));

			$data=CHtml::listData($data,'id','title');
					if(!empty($data))
						echo CHtml::tag	('option', array('value'=>''),CHtml::encode('لطفا انتخاب کنيد'),true);
						
					foreach($data as $value=>$city)  {
								echo CHtml::tag
										('option', array('value'=>$value),CHtml::encode($city),true);
							}   

		}
		/**
		* Displays expertTypes , use in ajax comnbo expertType  .
		*/
		public function actionExpert()
		{	
			$data=Expert::model()->findAll('expert_type_code=:expert_type_id',  array(':expert_type_id'=> $_POST['expert_type_id']));

			$data=CHtml::listData($data,'id','title');
					if(!empty($data))
						echo CHtml::tag	('option', array('value'=>''),CHtml::encode('لطفا انتخاب کنيد'),true);
						
					foreach($data as $value=>$city)  {
								echo CHtml::tag
										('option', array('value'=>$value),CHtml::encode($city),true);
							}   

		}
		/**
		* save to user expert
		*/
		public	function actionUserExpertSave(){
			$check	=	UserExpert::model()->find('user_code=:userCode	and expert_code=:expertCode', array(':userCode'=>$_POST['user_id']	,':expertCode'=>$_POST['expert']	));
			if(!$check){
					$model= new UserExpert;
					$model->user_code	=	$_POST['user_id'];
					$model->expert_code	=	$_POST['expert'];
					$model->save();
				}else{
					echo 'exist';
			}
		}
		/**
		* Displays skillTypes , use in ajax comnbo skillType  .
		*/
		public function actionSkill()
		{	
			$data=Skill::model()->findAll('skill_type_code=:skill_type_id',  array(':skill_type_id'=> $_POST['skill_type_id']));

			$data=CHtml::listData($data,'id','title');
					if(!empty($data))
						echo CHtml::tag	('option', array('value'=>''),CHtml::encode('لطفا انتخاب کنيد'),true);
						
					foreach($data as $value=>$city)  {
								echo CHtml::tag
										('option', array('value'=>$value),CHtml::encode($city),true);
							}   

		}
		/**
		* save to user skill
		*/
		public	function actionUserSkillSave(){
			$check	=	UserSkill::model()->find('user_code=:userCode	and skill_code=:skillCode', array(':userCode'=>Yii::app()->user->id	,':skillCode'=>$_POST['skill']	));
			if(!$check){
					$model= new UserSkill;
					$model->user_code	=	Yii::app()->user->id;
					$model->skill_code	=	$_POST['skill'];
					$model->save();
				}else{
					echo 'exist';
			}
		}
		
		/**
		* update to user information
		*/
		public	function actionUserInformationUpdate(){
			if(Yii::app()->request->isAjaxRequest){
				$model=UserInformation::model()->findByPk($_POST['user_id']);
				$model->$_POST['name']	=	$_POST['value'];
				$model->update($model); // update the change to database
			}
		}
	}	
?>