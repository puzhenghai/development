<?php
namespace common\models;

use yii\db\ActiveRecord;
class AlbumCate extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%album_cate}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
		];
	}
}