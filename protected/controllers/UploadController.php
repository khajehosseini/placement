<?php
class UploadController extends RController
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
	public function actionIndex(){
	
		$this->render('index');
	
	}
	/**
		* upload file in the server
	*/
	public function actionUpload()
	{
			$userProfile		=	FALSE;
			$userScansGenerate	=	FALSE;
			
			if(isset($_GET['nameDierctory']))
				$nameDirectory	=	$_GET['nameDierctory'];
			else
				$nameDirectory	=	'upload/';
				
			switch($_GET['separate']){
				case	'userProfile':
					$model=UserInformation::model()->findByPk($_GET['user_id']);
					$namePhoto		=	$model->photo;
					$user_id		=	$model->id;					
					$userProfile	=	TRUE;					
				break;
				case	'userScansGenerate':
					$user_id			=	$_GET['user_id'];
					$userScansGenerate	=	TRUE;
				break;
				default		:
					die();
				
			}

				Yii::import("ext.EAjaxUpload.qqFileUploader");
	        
                $folder=$nameDirectory;// folder for uploaded files
                $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
                $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
				
				if($userProfile){
					if($result['success']	==	1){
						$model				=	UserInformation::model()->findByPk($user_id);
						$model->photo		=	$result['filename'];
						$model->updateAll($model);
						unlink($nameDirectory.$namePhoto);
					}						
				}
				if($userScansGenerate){
					if($result['success']	==	1){
						$model				=	new Upload;
						$model->upload_type_code	=	$_GET['scanType'];
						$model->user_code			=	$user_id;
						$model->filename			=	$result['filename'];	
						$model->save();	
					}
				}
	            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;// it's array
	}
	/**
	* Displays List scan filed  , render of list by ajax
	*/
	public function actionScanedFileDetailList(){
			$user_id	=	Yii::app()->user->id;
			$uploads	=	Upload::model()->with('uploadTypeCode')->findAll(		array('condition'	=>	"user_code=$user_id"	,'order'	=>	't.id desc'));
			$this->renderPartial('scaned_file_detail_list',array('uploads'=>$uploads));
	}
	
	/**
		* delete file form tbl_upload .
	*/
	public function actionDeleteFileUpload(){
		$model=Upload::model()->findByPk($_GET['id']);
		$directoryName	=	$_GET['directoryName'];
		@unlink(	$directoryName	.	$model->filename);
		$model->delete();
	}
}
?>