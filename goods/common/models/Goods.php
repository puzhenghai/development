<?php
namespace common\models;

use yii\db\ActiveRecord;
class Goods extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%goods}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
		];
	}
}