<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	// Будем хранить id.
	protected $_id;

	// Данный метод вызывается один раз при аутентификации пользователя.
	public function authenticate(){
		// Производим стандартную аутентификацию, описанную в руководстве.
		$user = User::model()->find('LOWER(username)=?', [strtolower($this->username)]);

		if($user->ban==1)
			die('Ваш пользователь забанен или ещё не прошёл проверку администрацией.');

		if(($user===null) || (md5('sdgdahfdh'.$this->password)!==$user->password)) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else {
			$this->_id = $user->id;

			$this->username = $user->username;

			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}
}