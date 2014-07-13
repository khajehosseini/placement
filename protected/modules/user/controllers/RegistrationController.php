<?php

class RegistrationController extends RController
{
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}
	/**
	 * Registration user
	 */
	public function actionRegistration() {
			 if (!isset(Yii::app()->session['type_id']))
				 $this->redirect(array('/frontend/index'));
            $model		=	new RegistrationForm;
            $profile	=	new Profile;
			$userInformation	=	new UserInformation;
			$authassignment		=	new	Authassignment;
			
            $profile->regMode = true;
            
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
			{
				echo UActiveForm::validate(array($model,$profile));
				Yii::app()->end();
			}
			
		    if (Yii::app()->user->id) {
		    	$this->redirect(Yii::app()->controller->module->profileUrl);
		    } else {
		    	if(isset($_POST['RegistrationForm'])) {
					$model->attributes=$_POST['RegistrationForm'];
					$profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
					if($model->validate()&&$profile->validate())
					{
						$soucePassword = $model->password;
						$model->activkey=UserModule::encrypting(microtime().$model->password);
						$model->password=UserModule::encrypting($model->password);
						$model->verifyPassword=UserModule::encrypting($model->verifyPassword);
						$model->activkeymoblie		=	uniqid();
						$model->superuser=0;
						$model->status=((Yii::app()->controller->module->activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);
						
						if ($model->save()) {
							//+++++++++	userInformation
							$userInformation->id	=	$model->id;
							$userInformation->save();
							//---------
							//+++++++++ profile
							$profile->user_id=$model->id;
							$profile->type_code	=	Yii::app()->session['type_id'];
							$profile->save();
							//---------
							if	(Yii::app()->session['type_id']	==		1	){
								$authassignment->itemname	=	'karfarma_role';
								$authassignment->userid		=	$model->id;
								$authassignment->save();											
							}elseif (Yii::app()->session['type_id']	==	2	){
								$authassignment->itemname	=	'karjo_role';
								$authassignment->userid		=	$model->id;
								$authassignment->save();	
							}
									
							
							if (Yii::app()->controller->module->sendActivationMail) {
								if(	$model->email	!=	''){	
									$activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
									UserModule::sendMail($model->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
								}
								if(	$model->moblie	!=	''){	
									//send active code by sms  $model->activkeymoblie
								}								
							}
							
							if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) {
									$identity=new UserIdentity($model->username,$soucePassword);
									$identity->authenticate();
									Yii::app()->user->login($identity,0);
									$this->redirect(Yii::app()->controller->module->returnUrl);
							} else {
								if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) {
									Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
								} elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) {
									Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl))));
								} elseif(Yii::app()->controller->module->loginNotActiv) {
									Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login."));
								} else {
									Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email	or moblie."));
								}
								$this->refresh();
							}
						}
					} else $profile->validate(); 
				}
			    $this->render('/user/registration',array('model'=>$model,'profile'=>$profile));
		    }
	}
}