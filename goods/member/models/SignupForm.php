<?php
namespace member\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $member_name;
    public $member_email;
    public $member_passwd;
    public $member_rpasswd;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['member_name', 'filter', 'filter' => 'trim'],
            ['member_name', 'required'],
            ['member_name', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['member_name', 'string', 'min' => 2, 'max' => 255],

            ['member_email', 'filter', 'filter' => 'trim'],
            ['member_email', 'required'],
            ['member_email', 'email'],
            ['member_email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['member_passwd', 'required'],
            ['member_passwd', 'string', 'min' => 6],
            ['member_rpasswd', 'compare', 'compareAttribute' => 'member_passwd'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->member_name = $this->member_name;
            $user->member_email = $this->member_email;
            $user->setPassword($this->member_passwd);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }
}
