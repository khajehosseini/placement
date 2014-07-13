<?php

class ExpertLessonAssignController extends RController
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
$model=new ExpertLessonAssign;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['ExpertLessonAssign']))
{

$_POST['ExpertLessonAssign']['expert_code']	=	$_POST['expert_code'];	
$model->attributes=$_POST['ExpertLessonAssign'];

$model_find	=	 ExpertLessonAssign::model()->find('expert_code=:expert_code_id	and lesson_group_code=:lesson_group_code_id'	,	array(':expert_code_id'	=>	$_POST['ExpertLessonAssign']['expert_code']	,	':lesson_group_code_id'	=>	$_POST['ExpertLessonAssign']['lesson_group_code']));
if(is_null($model_find	)){
	if($model->save())
	$this->redirect(array('view','id'=>$model->id));
}else{
	echo 'error duplicate';
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

if(isset($_POST['ExpertLessonAssign']))
{
$_POST['ExpertLessonAssign']['expert_code']	=	$_POST['expert_code'];	
$model->attributes=$_POST['ExpertLessonAssign'];
$model_find	=	 ExpertLessonAssign::model()->find('expert_code=:expert_code_id	and lesson_group_code=:lesson_group_code_id'	,	array(':expert_code_id'	=>	$_POST['ExpertLessonAssign']['expert_code']	,	':lesson_group_code_id'	=>	$_POST['ExpertLessonAssign']['lesson_group_code']));
if(is_null($model_find	)){
	if($model->save())
		$this->redirect(array('view','id'=>$model->id));
}else{
echo 'duplicate error';
}	
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
$dataProvider=new CActiveDataProvider('ExpertLessonAssign');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ExpertLessonAssign('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ExpertLessonAssign']))
$model->attributes=$_GET['ExpertLessonAssign'];

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
$model=ExpertLessonAssign::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
/**
* Displays expertTypes , use in ajax comnbo expertType  .
*/
public function actionExpert()
{	
	$data=Expert::model()->findAll('expert_type_code=:expert_type_id',  array(':expert_type_id'=> $_POST['expert_type_id']));

	$data=CHtml::listData($data,'id','title');
			if(!empty($data))
				echo CHtml::tag	('option', array('value'=>''),CHtml::encode('áØİÇ ÇäÊÎÇÈ ˜äíÏ'),true);
				
			foreach($data as $value=>$city)  {
						echo CHtml::tag
								('option', array('value'=>$value),CHtml::encode($city),true);
					}   

}
/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='expert-lesson-assign-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
