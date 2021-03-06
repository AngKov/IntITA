<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $userEmail;
	public $userPassword;
	public $rememberMe;

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
			array('userEmail, userPassword', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('userPassword', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Запамя\'тати мене',
			'userEmail'=>'Логін',
			'userPassword'=>'Пароль',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute=null, $params=null)
	{
		$identity = new UserIdentity($this->userEmail, $this->userPassword);
		$identity->authenticate();

		switch($identity->errorCode)
		{
			case UserIdentity::ERROR_NONE:
			{
				$duration = $this->rememberMe ? 3600*24*7 : 0; // 30 days
				Yii::app()->user->login($identity, $duration);
				return true;
			}
			case UserIdentity::ERROR_PASSWORD_INVALID:
				$this->addError('login', Yii::t('errors', 'Sorry, your account is blocked'));
				break;
			default:
				$this->addError('password', Yii::t('errors', 'Login or password is incorrect'));
				break;
		}
		return false;
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->userEmail,$this->userPassword);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
