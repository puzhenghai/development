<?php
namespace common\models;

use yii\db\ActiveRecord;
class Store extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%store}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['store_owner_card'], 'unique'],
		];
	}
	
	public static function getStoreById($member_id){
		if(!empty($member_id)){
			return self::findOne(['member_id'=>$member_id]);
		}
		return null;
	}
}