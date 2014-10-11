<?php
namespace common\models;

use yii\db\ActiveRecord;
class AlbumPic extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%album_pic}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
		];
	}
}