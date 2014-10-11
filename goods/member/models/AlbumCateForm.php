<?php
namespace member\models;

use yii\base\Model;
use Yii;
use common\models\AlbumCate;

class AlbumCateForm extends Model {
	public $acate_name;
	public $store_id;
	public $acate_des;
	public $acate_sort;
	public $acate_cover;
	public $upload_time;
	public $is_default;
	
	public function rules(){
		return [
		];
	}
   
	public function addDefaultAlbum($store_id){
		$album = new AlbumCate();
		$album->acate_name = '默认相册';
		$album->store_id = $store_id;
		$album->acate_des =  '默认相册';
		$album->acate_cover = "";
		$album->upload_time = time();
		$album->is_default = 1;
		$album->save();
	}
}
