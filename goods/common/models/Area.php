<?php
namespace common\models;

use yii\db\ActiveRecord;
class Area extends ActiveRecord{
	public static function tableName(){
		return "{{area}}";
	}
}