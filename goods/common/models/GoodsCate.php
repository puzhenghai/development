<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii;
use yii\db\Query;
use components\PZ;
class GoodsCate extends ActiveRecord{
	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return '{{%goods_cate}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
		];
	}
	/**
	 * 
	 * @param number $parent_id 父id
	 * @param string $type true 返回数组 false 返回对象
	 */
	
	public function getCates($parent_id=0, $type=true) {
		$cates = $this->find()->select(['gc_id', 'gc_name'])->where(['gc_parent_id'=>$parent_id])->all();
		if(!empty($cates) && $type) {
			foreach ($cates as $cate) {
				$arrs[$cate->gc_id] = $cate->gc_name;
			}
			return $arrs;
		}elseif (!empty($cates) && !$type) {
			foreach ($cates as $k => $cate) {
				$arrs[$k]['gc_id'] = $cate->gc_id;
				$arrs[$k]['gc_name'] = $cate->gc_name;
			}
			return json_encode($arrs);
		}
		return $cates;
	}
	
	public function getGoodsCateAllById($gc_id){
		$connection = PZ::getDB();
		//$orders = $this->find()>innerJoinWith('goods_cate')->all();
		$sql = "select a.gc_id as agc_id,a.gc_name as agc_name,b.gc_id as bgc_id,b.gc_name as bgc_name,c.gc_id as cgc_id,c.gc_name as cgc_name from goods_cate a, goods_cate b, goods_cate c 
	where a.gc_id = b.gc_parent_id and b.gc_id = c.gc_parent_id and c.gc_id={$gc_id}";
		$command = $connection->createCommand($sql);
		$result = $command->queryOne();
		if (empty($result)){
			$sql = "select a.gc_id as agc_id,a.gc_name as agc_name,b.gc_id as bgc_id,b.gc_name as bgc_name from goods_cate a, goods_cate b, goods_cate c
		where a.gc_id = b.gc_parent_id  and b.gc_id={$gc_id}";
			$command = $connection->createCommand($sql);
			$result = $command->queryOne();
		}
		return $result;
	}
}