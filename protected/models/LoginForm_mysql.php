<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
        public $email;
        public $senha;
        public $tipo_user;
        public $nome;
	public $tipo_maq;
        private $_identity;
        

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate()
	{
//            $criteria = new EMongoCriteria();
//            $criteria->addCond("usua_login", "==", $this->usuario);
//            $criteria->addCond("usua_senha", "==", $this->senha);

            $model = Usuario::model()->find("email_user LIKE '".$this->email. "' AND senha LIKE '".$this->senha."'");

            if ($this->email == '' || $this->senha == '') {
                Yii::app()->user->setFlash('error', 'Usuário e senha são obrigatórios.');
                return false;
            }
            else if (empty($model)) {
                Yii::app()->user->setFlash('error', 'Usuário ou senha inválidos');
                return false;
            }
            else {
                $this->email = $model->email_user;
                $this->tipo_user = $model->tipo_user;
                $this->nome = $model->nome;
//                $this->usua_tipo   = UsuarioTipo::model()->findByPk(new MongoID($modelUsuario->usua_tipo));
                $this->_identity = new UserIdentity($this->email, $this->senha);
                return true;
            }
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if ($this->authenticate() == true) {
                    $duration = 3600 * 24 * 1000;
                        Yii::app()->user->login($this->_identity, $duration);
                return true;
                }
                else {
                    return false;
                }
	}
}
