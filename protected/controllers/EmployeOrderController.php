<?php

class EmployeOrderController extends RController
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

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
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new EmployeOrder;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['EmployeOrder']))
{
$model->attributes			=	$_POST['EmployeOrder'];
$model->karfarma_user_code	=	Yii::app()->user->id;
	if($model->save()){
		foreach	($_POST['expert_code']	as	$k	=>	$expertID){
				if($expertID	!=	''){
				$model_expert=EmployeOrderExpert::model()->find('employe_order_code=:employe_order_code_id	and		expert_code=:expert_code_id'	,	array(':employe_order_code_id'=>$model->id	,	':expert_code_id'=>$expertID	));
					if(	$model_expert	==	null){
						$model_expert	=	new	EmployeOrderExpert;
						$model_expert->employe_order_code	=$model->id;
						$model_expert->expert_code			=$expertID;
						$model_expert->save();
					}
				}
		}
		
		
		foreach	($_POST['skill_code']	as	$k	=>	$skillID){
				if($skillID	!=	''){
					$model_skill=EmployeOrderSkill::model()->find('employe_order_code=:employe_order_code_id	and		employe_order_skill=:skill_code_id'	,	array(':employe_order_code_id'=>$model->id	,	':skill_code_id'=>$skillID	));
					if(	$model_skill	==	null){
						$model_skill	=	new	EmployeOrderSkill;
						$model_skill->employe_order_code			=	$model->id;
						$model_skill->employe_order_skill			=	$skillID;
						$model_skill->save();
					}	
				}
		}
	
		$this->redirect(array('view','id'=>$model->id));
	}
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['EmployeOrder']))
{
$model->attributes=$_POST['EmployeOrder'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('EmployeOrder');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new EmployeOrder('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['EmployeOrder']))
$model->attributes=$_GET['EmployeOrder'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=EmployeOrder::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='employe-order-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function	actionexpertAndSkillByJobCode(){
	
	$model	=	new	JobExpertAssign;
	$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'skill-user-grid',
		'dataProvider'=>$model->searchR($_POST['jobCodeId']),
		'filter'=>$model,
		'columns'=>array(
		array(	'name'	=>	'expertCode.title'	,	'header'	=>	'تخصص'	),
		),
		));
	echo	'<br>';
	$model	=	new	JobSkillAssign;
	$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'skill-user-grid',
		'dataProvider'=>$model->searchR($_POST['jobCodeId']),
		'filter'=>$model,
		'columns'=>array(
		array(	'name'	=>	'skillCode.title'	,	'header'	=>	'مهارت'	),
		),
		));
	
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

}
