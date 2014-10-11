<?php
namespace common\models;

use yii\db\ActiveRecord;
use components\PZ;
class Region extends ActiveRecord{
	public static function tableName(){
		return "{{region}}";
	}
	
	public static function getRegionById($region_parent_id=0, $type=true){
		$regions = self::find()->select(['region_id','region_name'])->where(['region_parent_id'=>$region_parent_id])->all();
		$arrs = array();
		
		if(!empty($regions) && $type) {
			foreach ($regions as $region) {
				$arrs[$region->region_id] = $region->region_name;
			}
			return $arrs;
		}elseif (!empty($regions) && !$type) {
			foreach ($regions as $k => $region) {
				$arrs[$k]['region_id'] = $region->region_id;
				$arrs[$k]['region_name'] = $region->region_name;
			}
			return json_encode($arrs);
		}
		return null;
	}
	
	public static function getRegionAddress($region_id){
		$connection = PZ::getDB();
		$sql = "select a.region_name as province, b.region_name as city, c.region_name as area from region a,region b, region c 
	where a.region_id = b.region_parent_id and b.region_id = c.region_parent_id and c.region_id={$region_id}";
		$command = $connection->createCommand($sql);
		$result = $command->queryOne();
		return $result;
	}
}
