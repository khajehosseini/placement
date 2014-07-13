<?php

class ActivationController extends RController
{
	public $defaultAction = 'activation';
	/**
	 * Activation user account
	 */
	public function actionActivation () {
		$email = $_GET['email'];
		$activkey = $_GET['activkey'];
		if ($email&&$activkey) {
			$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
			if (isset($find)&&$find->status) {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is active.")));
			} elseif(isset($find->activkey) && ($find->activkey==$activkey)) {
				$find->activkey = UserModule::encrypting(microtime());
				$find->status = 1;
				$find->save();
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is activated.")));
			} else {
			    $this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Incorrect activation URL.")));
			}
		} else {
			$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Incorrect activation URL.")));
		}
	}
	function actionActivationMoblie() {
		$model		=	new ActivationMoblieForm;
		if(isset($_POST['ActivationMoblieForm']))
		{
			$model->attributes=$_POST['ActivationMoblieForm'];
			if($model->validate()) {
				$find = User::model()->notsafe()->findByAttributes(array('username'=>$model->username , 'moblie'=>$model->moblie	,	'activkeymoblie'=>$model->activkeymoblie));
				
				
				if(!empty($find)){
					if($find->status){
						$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is active.")));
					}else{
						$find->status	=	1;
						$find->save();
						$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("You account is activated.")));
					}				
				}else{
					$this->render('/user/message',array('title'=>UserModule::t("User activation"),'content'=>UserModule::t("Incorrect activation CODE or USERNAME or MOBLIE.")));
				}
			}
		}else
			$this->render('/user/activationMoblie',array('model'=>$model));
		
	}
	

}