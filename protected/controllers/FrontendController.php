<?php
class FrontendController extends RController
{
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	function	actionIndex(){
		$this->render('home/index');
	}
	function 	actionIduser($id	=	0){
		if(	$id	==	2	||	$id	==	3) {
			Yii::app()->session['type_id']	=	$id;	
			$this->redirect(array('user/registration'));
		}else	
			$this->redirect('index');
	}
}
?>