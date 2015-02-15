<?php

class StudentProfileController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','UploadAvatar','AvatarStatus'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new StudentProfile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentProfile']))
		{
			$model->attributes=$_POST['StudentProfile'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['StudentProfile']))
		{
			$model->attributes=$_POST['StudentProfile'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */

	public function actionIndex()
	{
 	   $model=new StudentProfile(); 
        if(isset($_POST['StudentProfile']))
        {
            $model->attributes=$_POST['StudentProfile'];
            if($model->validate())
            {
                if ($model->model()->count("login = :login", array(':login' => $model->login))) 
                    {
                    // Указанный логин уже занят. Создаем ошибку и передаем в форму
                    $model->addError('login', 'Логін уже зайнятий');
                    $this->render("studentprofile", array('model' => $model));
                    }else 
                    {
                    $model->save();
                    Yii::app()->user->setFlash('message','Ваші дані оновлено');
                    $this->render("studentprofile", array('model'=>$model));           
                    }

            } else {
                    $this->render("studentprofile", array('model'=>$model));
                    }      
    	}else {
    	        $this->render("studentprofile", array('model'=>$model));  
    	      }
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentProfile']))
			$model->attributes=$_GET['StudentProfile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentProfile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentProfile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUploadAvatar()
	{
	   $model=new StudentProfile(); 
       $model->attributes=$_POST['StudentProfile'];
       echo $model->login;
        if($_FILES["filename"]["size"] > 1024*1024*0.5)
          {
              echo ("Розмір файла перевищує 500кб");
              echo "<meta http-equiv=\"refresh\" content=\"2;url=" . $_SERVER['HTTP_REFERER'] . "\">";
              exit;
          }
        if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
                $ext = substr(strrchr( $_FILES["filename"]["name"],'.'), 1);
                 $id='1'.'id';
                 $_FILES["filename"]["name"]=$id . '.'. $ext;
                 move_uploaded_file($_FILES["filename"]["tmp_name"],
                 "image/".$_FILES["filename"]["name"]);
                echo "<meta http-equiv=\"refresh\" content=\"2;url=" . $_SERVER['HTTP_REFERER'] . "\">";
              } else {
                echo("Помилка завантаження файла");
               echo "<meta http-equiv=\"refresh\" content=\"2;url=" . $_SERVER['HTTP_REFERER'] . "\">";
              }	   
    }
    	public function actionAvatarStatus()
	{

            echo ("Файл вибрано");

 
    }
    
        
}
