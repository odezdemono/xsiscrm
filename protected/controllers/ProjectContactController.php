<?php

class ProjectContactController extends Controller
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
				'actions'=>array('index','view'),
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
		$model=new ProjectContact;
		$model2=new Address;
		$model3=new Email;
		$model4=new Phone;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProjectContact'],$_POST['Address'],$_POST['Email'],$_POST['Phone']))
		{
			$model->attributes=$_POST['ProjectContact'];
			
			$criteria=new CDbCriteria;
			$criteria->compare('name',$_POST['ProjectContact']['project_id'],true );
			$projname=Project::model()->find($criteria);
			$model->project_id=$projname->id;
			
			$model2->attributes=$_POST['Address'];
			$model3->attributes=$_POST['Email'];
			$model4->attributes=$_POST['Phone'];
			
			if($model->save())
			
				$model2->person_type_id=2;
				$model2->person_id=$model->id;
				$model2->save();
				
				$model3->person_type_id=2;
				$model3->person_id=$model->id;
				$model3->save();
				
				$model4->person_type_id=2;
				$model4->person_id=$model->id;
				$model4->save();
					
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
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
		$model2=$this->loadModelAddress($id);
		$model3=$this->loadModelEmail($id);
		$model4=$this->loadModelPhone($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProjectContact']) && isset($_POST['Address']) && isset($_POST['Email']) && isset($_POST['Phone']))
		{
			$model->attributes=$_POST['ProjectContact'];
			$model2->attributes=$_POST['Address'];
			$model3->attributes=$_POST['Email'];
			$model4->attributes=$_POST['Phone'];
			
			if($model->save() && $model2->save() && $model3->save() && $model4->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'model2'=>$model2,'model3'=>$model3,'model4'=>$model4,
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
		$dataProvider=new CActiveDataProvider('ProjectContact');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProjectContact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProjectContact']))
			$model->attributes=$_GET['ProjectContact'];

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
		$model=ProjectContact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelAddress($id)
	{
		$model=Address::model()->find('person_type_id=:idp and person_id=:id', array(':idp'=>2,':id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelEmail($id)
	{
		$model=Email::model()->find('person_type_id=:idp and person_id=:id', array(':idp'=>2,':id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelPhone($id)
	{
		$model=Phone::model()->find('person_type_id=:idp and person_id=:id', array(':idp'=>2,':id'=>$id));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
