<?php
namespace common\models;

use yii\db\ActiveRecord;
class StoreCate extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%store_cate}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
		];
	}
	
}