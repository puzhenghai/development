<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * AlbumPic form
 */
class AlbumPicForm extends Model
{
    public $member_name;
    public $member_passwd;
    public $verifyCode;
    private $member = false;

   
}
