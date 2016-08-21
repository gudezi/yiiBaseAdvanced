<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Password reset request form
 */
class ChangePasswordForm extends Model
{
	
	public $currentPassword;
	public $newPassword;
	public $newPasswordConfirm;
	
	private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['currentPassword','newPassword','newPasswordConfirm'], 'required'],
			[['currentPassword'], 'validateCurrentPassword'],
			
			[['currentPassword','newPasswordConfirm'], 'string', 'min' => 3],
			[['currentPassword','newPasswordConfirm'], 'filter', 'filter' => 'trim'],
			[['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Passwords do not match'],
        ];
    }

	public function validateCurrentPassword()
	{
		$this->_user = User::findByUsername( Yii::$app->user->identity->username);

        if (!$this->_user || !$this->_user->validatePassword($this->currentPassword)) {
            $this->addError('currentPassword', 'Incorrect current password.');
        }
	}
	
	public function attributeLabels()
	{
		return [
			'currentPassword' => 'Old Password',
			'newPassword' => 'New Password',
			'newPasswordConfirm' => 'Old Password Confirm',
		];
	}
	
	public function changePassword()
	{
		$user = $this->_user;
        $user->setPassword($this->newPassword);

        return $user->save(false);
	}
}
