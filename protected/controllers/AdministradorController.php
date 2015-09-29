<?php

class AdministradorController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
 
        public function actionEmail($email_user, $nome) {
            $this->render('cadastro', array("email_user"=>$email_user,"nome"=>$nome));
        }
        
        public function actionErroEmail($email_user, $nome) {
            $this->render('erro_email', array("email_user"=>$email_user,"nome"=>$nome));
        }
        
        public function actionErroEmailSenha($email_user) {
            $this->render('erro_email_senha', array("email_user"=> $email_user));
        }
        
        public function actionSucessoEmail() {
            $this->render('sucesso_email');
        }
        
        public function actionSucessoEmailSenha() {
            $this->render('sucesso_email_senha');
        }
        
         public function actionErro() {
            $this->render('erro');
        }
        
        public function actionSucesso() {
            $this->render('sucesso_cadastro');
        }
        
        public function actionValidation(){
            $id = $_GET['id'];
            
            $criteria = new EMongoCriteria();
            $criteria->addCond("validacao", "==", $id);
            $modelUser = Usuario::model()->find($criteria);
            
            if($modelUser){
                $modelUser->validacao = '1';
                $modelUser->save();
///                if(!$modelUser->save()){
//                    print_r($modelUser->validacao);
//                    exit();
//                }
                $this->render('sucesso_cadastro');
            }
            else{
                $this->render('erro_cadastro');
            }
        }

        public function actionSendMailCadastro($email,$contato){
            require_once 'protected/extensions/phpmailer/class.phpmailer.php';
            $email_validation = md5($email);
            
            $criteria = new EMongoCriteria();
            $criteria->addCond("email_user", "==", $email);
            
            $modelUser = Usuario::model()->find($criteria);
            $modelUser->validacao = $email_validation;
            $modelUser->save();
            
            $url = CHtml::link('Validar Email', Yii::app()->createAbsoluteUrl('administrador/validation',array('id'=>$email_validation)));
            
            $mail = new PhpMailer;

            $mail->SetLanguage("br", "libs/"); // ajusto a lingua a ser utilizadda

            $mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
            
            $mail->CharSet = 'utf-8';
            
            $mail->SMTPSecure = "tls"; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail

            $mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP

            $mail->Host = "smtp.gmail.com";  // especifico o endereço do servidor smtp do GMail

            $mail->SMTPAuth = true;  // ativo a autenticação SMTP, no caso do GMail, é necessário

            $mail->Username = "oatagging@gmail.com";  // Usuário SMTP do GMail

            $mail->Password = "oat102030"; // Senha do usuário SMTP do GMail

            $mail->From = "oatagging@gmail.com"; // Email de quem envia o email

            $mail->FromName = "Online Assitive Tagging"; // Nome de quem envia o email

            $mail->AddAddress($email); // Endereço e nome de quem vai receber o email, o nome é opcional

//            $mail->AddAddress("rodrigojerry@gmail.com"); // Mais um endereço, somente para mostrar que você pode mandar email para varios endereços no mesmo email. Equilvalente a você usar a [vírgula] nos webmail e clientes de email

            $mail->WordWrap = 50;// quebra linha sempre que uma linha atingir 50 caracteres

            $mail->IsHTML(true);// ajusto envio do email no formato HTML
            
            $mail->Subject = "Validação de Login"; // Aqui colocar o assunto do email
            $mail->Body     = "Olá, ".$contato."<br>Obrigado por se cadastrar! <br>Click no link para validar seu email: ".$url; 
            $mail->AltBody = "Olá, ".$contato."Obrigado por se cadastrar! Click no link para validar seu email: ".$url;     
//            $mail->SMTPDebug =2 ;
            
            if(!$mail->Send()){
//               echo "Mensagem n&atilde;o pode ser enviada. <p>";
//               echo $mail->ErrorInfo;
//               var_dump($mail);
//               echo "Erro: " . $mail->Debugoutput;
               $this->redirect("index.php?r=administrador/erroemail"."/email_user/".$email."/nome/".$contato);
            }
        }
        
        public function actionSendMail($email,$contato){
            require_once 'protected/extensions/phpmailer/class.phpmailer.php';
            
            
            $criteria = new EMongoCriteria();
            $criteria->addCond("email_user", "==", $email); 
            
            $modelUser = Usuario::model()->find($criteria);
            if($modelUser->validacao != '0'){
                $email_validation = $modelUser->validacao;
            }
            else if($modelUser->validacao == '0'){
                $email_validation = md5($email);
                $modelUser->validacao = $email_validation;
                $modelUser->save();
            }
            
            
            $url = CHtml::link('Validar Email', Yii::app()->createAbsoluteUrl('administrador/validation',array('id'=>$email_validation)));
            
            $mail = new PhpMailer;

            $mail->SetLanguage("br", "libs/"); // ajusto a lingua a ser utilizadda

            $mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
            
            $mail->CharSet = 'utf-8';
            
            $mail->SMTPSecure = "tls"; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail

            $mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP

            $mail->Host = "smtp.gmail.com";  // especifico o endereço do servidor smtp do GMail

            $mail->SMTPAuth = true;  // ativo a autenticação SMTP, no caso do GMail, é necessário

            $mail->Username = "oatagging@gmail.com";  // Usuário SMTP do GMail

            $mail->Password = "oat102030"; // Senha do usuário SMTP do GMail

            $mail->From = "oatagging@gmail.com"; // Email de quem envia o email

            $mail->FromName = "Online Assitive Tagging"; // Nome de quem envia o email

            $mail->AddAddress($email); // Endereço e nome de quem vai receber o email, o nome é opcional

//            $mail->AddAddress("rodrigojerry@gmail.com"); // Mais um endereço, somente para mostrar que você pode mandar email para varios endereços no mesmo email. Equilvalente a você usar a [vírgula] nos webmail e clientes de email

            $mail->WordWrap = 50;// quebra linha sempre que uma linha atingir 50 caracteres

            $mail->IsHTML(true);// ajusto envio do email no formato HTML
            
            $mail->Subject = "Validação de Login"; // Aqui colocar o assunto do email
            $mail->Body = "Olá, ".$contato."<br>Obrigado por se cadastrar! <br>Click no link para validar seu email: ".$url; 
            $mail->AltBody = "Olá, ".$contato."Obrigado por se cadastrar! Click no link para validar seu email: ".$url;
//            $mail->SMTPDebug =2 ;
            
            if(!$mail->Send()){
//               echo "Mensagem n&atilde;o pode ser enviada. <p>";
//               echo $mail->ErrorInfo;
//               var_dump($mail);
//               echo "Erro: " . $mail->Debugoutput;
//               $this->redirect("index.php?r=administrador/erroemail");
                 $this->redirect("index.php?r=administrador/erroemail"."/email_user/".$email."/nome/".$contato);
            }else{
//            echo "Mensagem enviada";
                $this->redirect("index.php?r=administrador/sucessoemail");
            }
        }
        
        public function actionNewPassword(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            
            }
            
            $model=new Usuario;
            
 
            if(isset($_POST['Usuario']))
            {
                
                $_id = $_POST['Usuario']['_id'];
                $criteria = new EMongoCriteria();
                $criteria->addCond("_id", "==", new MongoId($_id));

                $model = Usuario::model()->find($criteria);
                
                $model->senha=$_POST['Usuario']['senha'];
                 $model->confirmar_senha=$_POST['Usuario']['senha'];
//                var_dump($model);
//                exit();
//                
//                if(isset($model)){
                if($model->save()){
//                        var_dump($id);
                
                    $this->redirect("index.php?r=site/index");
                }
//                }
                
            }
            $this->render('recuperar_senha',array(
                'model'=>$model,
                '_id' =>$id
            ));
            
        }


        public function actionRecoverPassword(){
            require_once 'protected/extensions/phpmailer/class.phpmailer.php';
            if(isset($_POST['rec_senha_email'])){
               $email = $_POST['rec_senha_email'];
            }
            else if(isset($_GET['email'])){
                $email = $_GET['email'];
            }
            $criteria = new EMongoCriteria();
            $criteria->addCond("email_user", "==", $email); 
            
            
            $modelUser = Usuario::model()->find($criteria);
            
            $url = CHtml::link('Recuperar Senha', Yii::app()->createAbsoluteUrl('administrador/newpassword',array('id'=>$modelUser->_id)));

            if($modelUser->validacao == '1'){
//                $email_validation = $modelUser->validacao;
                $mail = new PhpMailer;

                $mail->SetLanguage("br", "libs/"); // ajusto a lingua a ser utilizadda

                $mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza

                $mail->CharSet = 'utf-8';

                $mail->SMTPSecure = "tls"; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail

                $mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP

                $mail->Host = "smtp.gmail.com";  // especifico o endereço do servidor smtp do GMail

                $mail->SMTPAuth = true;  // ativo a autenticação SMTP, no caso do GMail, é necessário

                $mail->Username = "oatagging@gmail.com";  // Usuário SMTP do GMail

                $mail->Password = "oat102030"; // Senha do usuário SMTP do GMail

                $mail->From = "oatagging@gmail.com"; // Email de quem envia o email

                $mail->FromName = "Online Assitive Tagging"; // Nome de quem envia o email

                $mail->AddAddress($email); // Endereço e nome de quem vai receber o email, o nome é opcional

    //            $mail->AddAddress("rodrigojerry@gmail.com"); // Mais um endereço, somente para mostrar que você pode mandar email para varios endereços no mesmo email. Equilvalente a você usar a [vírgula] nos webmail e clientes de email

                $mail->WordWrap = 50;// quebra linha sempre que uma linha atingir 50 caracteres

                $mail->IsHTML(true);// ajusto envio do email no formato HTML

                $mail->Subject = "Recuperar Senha"; // Aqui colocar o assunto do email
                $mail->Body     = "Olá, ".$modelUser->nome."<br/>Click no link para recuperar a senha:".$url; 
//                $mail->Body     = "Olá, ".$modelUser->nome."<br/>Seus dados para login. <br/>Email: ".$modelUser->email_user. "<br/>Senha: ".$modelUser->senha; 
//                $mail->AltBody = "Olá, ".$modelUser->nome."Seus dados para login. Email: ".$modelUser->email_user. "Senha: ".$modelUser->senha;      
    //            $mail->SMTPDebug =2 ;

                if(!$mail->Send()){
    //               echo "Mensagem n&atilde;o pode ser enviada. <p>";
    //               echo $mail->ErrorInfo;
    //               var_dump($mail);
    //               echo "Erro: " . $mail->Debugoutput;
    //               $this->redirect("index.php?r=administrador/erroemail");
                     $this->redirect("index.php?r=administrador/erroemailsenha"."/email_user/".$modelUser->email_user);
                }else{
    //            echo "Mensagem enviada";
                    $this->redirect("index.php?r=administrador/sucessoemailsenha");
                }

                
                
            }
            else if($modelUser->validacao == '0'){
//                $email_validation = md5($email);
//                $modelUser->validacao = $email_validation;
//                $modelUser->save();
            }
            
            
            
            
            
        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}