<?php

Yii::import('application.controllers.AdministradorController');


class AcessoController extends Controller {

    public function init() {
        parent::init();
        Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/signin.css");
    }

    public function actionIndex() {
        if(!Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
        }
        $this->render('login');
    }

    public function actionError() {
        if($error = Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    
    public function actionLogin() {
        $model = new LoginForm;
        $email = $_POST['LoginForm']['email'];
        $senha = $_POST['LoginForm']['senha'];

        if(!empty($email) && !empty($senha)) {
            $model->email = $_POST['LoginForm']['email'];
            $model->senha = $_POST['LoginForm']['senha'];
            if(!empty($_POST['LoginForm']['tipo_maq'])){ 
                $tipo_maq = $_POST['LoginForm']['tipo_maq'];
                Yii::app()->user->setState("tipo_maq", $tipo_maq);
            }
//            echo $tipo_maq;
//            exit();
                    
            if($model->login()) {
                Yii::app()->user->setState("email", $model->email);
                Yii::app()->user->setState("nome", $model->nome);
                Yii::app()->user->setState("tipo_user", $model->tipo_user);
                Yii::app()->user->setState("validacao", $model->validacao);
//                Yii::app()->user->setState("usua_tipo", $model->usua_tipo);
//                Yii::app()->user->setState("usua_login", $model->usua_login);
                if((Yii::app()->user->getState('tipo_user') == 2) && (Yii::app()->user->getState('validacao') == '1') ){
                    $this->redirect('index.php?r=avaliacoes');
                }
                else if (Yii::app()->user->getState('validacao') != '1' ) {
//                    AdministradorController::actionEmail();
//                        $this->redirect("index.php?r=administrador/email");
                        $this->redirect("index.php?r=administrador/email"."/email_user/".$model->email."/nome/".$model->nome);
//                    echo "envia o email e reencaminha para a pagina do 'quase lá'";
//                    exit();
//                    $this->redirect('index.php?r=administrador');
                    
                }
                
                if((Yii::app()->user->getState('tipo_user') == 1) && (Yii::app()->user->getState('validacao') == '1') ){
                    $this->redirect('index.php?r=administrador');
                }
                else if (Yii::app()->user->getState('validacao') != '1' ) {
//                    AdministradorController::actionEmail();
//                    $this->redirect("index.php?r=administrador/email");
                    $this->redirect("index.php?r=administrador/email"."/email_user/".$model->email."/nome/".$model->nome);
//                    $this->redirect("index.php?r=administrador/email/email_user/".$model->email_user."nome/".$model->nome);
//                      echo "envia o email e reencaminha para a pagina do 'quase lá'";
//                    exit();
//                    $this->redirect('index.php?r=administrador');
                    
                }
                
                
            }
        }
        $this->redirect('index.php?r=site/index');
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect('index.php?r=site/index');
    }

}

?>
