<?php
namespace member\models;

use yii\base\Model;
use Yii;
use common\models\AlbumPic;

class AlbumPicForm extends Model {
	public $apic_name;
	public $apic_tag;
	public $acate_id;
	public $apic_cover;
	public $apic_size;
	public $apic_spec;
	public $store_id;
	public $upload_time;
	
	public function rules(){
		return [
		];
	}
	
	public function addAlbumPic(){
		if($this->validate()){
			$albumPic = new AlbumPic();
			$albumPic->apic_name = $this->apic_name;
			$albumPic->apic_tag = $this->apic_tag;
			$albumPic->acate_id = $this->acate_id;
			$albumPic->apic_cover = $this->apic_cover;
			$albumPic->apic_size = $this->apic_size;
			$albumPic->store_id = $this->store_id;
			$albumPic->upload_time = $this->upload_time;
			return $albumPic->save();
		}
	}
}
