<?php

class AvaliacoesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

        public function init() {
            parent::init();
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/bootstrap.css");
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/mediaelementplayer.css");
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.js");
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/mediaelement-and-player.min.js");
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/bootstrap.min.js");
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/video.js");
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/tagging.js");
            if(Yii::app()->user->isGuest){
                $this->redirect('index.php?r=site/index');
            }
        }  
        
        
	/**
         * 
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
//			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update', 'dynamiccities'),
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
        
        public function actionDynamiccities()
        {
            $data=Location::model()->findAll('parent_id=:parent_id', 
                          array(':parent_id'=>(int) $_POST['country_id']));

            $data=CHtml::listData($data,'id','name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                           array('value'=>$value),CHtml::encode($name),true);
            }
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
		$model=new Avaliacao;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Avaliacao']))
		{
			$model->attributes=$_POST['Avaliacao'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->avaliacaoID));
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

		if(isset($_POST['Avaliacao']))
		{
			$model->attributes=$_POST['Avaliacao'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->avaliacaoID));
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
		$dataProvider=new CActiveDataProvider('Avaliacao');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Avaliacao('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Avaliacao']))
			$model->attributes=$_GET['Avaliacao'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionSendData(){
            $response = array();
            
            $arrayTagsSelected = $_GET['tagSelected'];
            $arrayTagsSuggested = $_GET['tagSuggested'];
            $videoId = $_GET['idVideo'];
            $playing = $_GET['playing'];
            
//            $user = Yii::app()->user->getState('usuario'); //esta vindo nulo!!
            $user_email = Yii::app()->user->getState("email"); //continua nulo
            $modelAvaliacao = new Avaliacao();
            
            $modelAvaliacao->email_user = $user_email;
            $modelAvaliacao->videoID = $videoId;
            $modelAvaliacao->tags_suggested = $arrayTagsSuggested;
            $modelAvaliacao->tags_selected = $arrayTagsSelected;
            
            $criteria = new EMongoCriteria();
            $criteria->addCond("idVideo", "==", $videoId);
            
//            $modelVideoAmostraAtual = VideosAmostra::model()->find("idVideo LIKE '".$videoId."'");
            $modelVideoAmostraAtual = VideosAmostra::model()->find($criteria);        
            
            $modelVideoAmostraAtual->nro_avaliacoes = $modelVideoAmostraAtual->nro_avaliacoes + 1;
            
            $modelAvaliacao->save();
            $modelVideoAmostraAtual->save();
            
            $response['playing'] = $playing;    
            echo json_encode($response);
            
//            if($playing==2){
//                $this->redirect('index.php?r=site/index');
//            }
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Avaliacao the loaded model
	 * @throws CHttpException
	 */  
	public function loadModel($id)
	{
		$model=Avaliacao::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Avaliacao $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='avaliacao-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
