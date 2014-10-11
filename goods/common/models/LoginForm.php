<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $member_name;
    public $member_passwd;
    public $verifyCode;
    private $member = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // member_name and member_passwd are both required
            [['member_name', 'member_passwd'], 'required'],
            // rememberMe must be a boolean value
            // member_passwd is validated by validatemember_passwd()
        	['verifyCode', 'captcha'],
            ['member_passwd', 'validatePasswd'],
        ];
    }

    /**
     * Validates the member_passwd.
     * This method serves as the inline validation for member_passwd.
     */
    public function validatePasswd()
    {
        if (!$this->hasErrors()) {
            $member = $this->getMember();
            if (!$member || !$member->validatePassword($this->member_passwd)) {
                $this->addError('member_passwd', 'Incorrect member_name or member_passwd.');
            }
        }
    }

    /**
     * Logs in a user using the provided member_name and member_passwd.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getMember(), 3600 * 2);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[member_name]]
     *
     * @return Member |null
     */
    public function getMember()
    {
        if ($this->member === false) {
            $this->member = Member::findByMemberName($this->member_name);
        }

        return $this->member;
    }
}
