<?php
namespace member\models;

use common\models\Store;
use yii\base\Model;
use Yii;
use common\models\StoreCate;

class AddStoreForm extends Model {
	public $store_name;
	public $sc_id;
	public $region_id;
	public $store_address;
	public $store_zip;
	public $store_tel;
	public $store_owner_card;
	public $store_image;
	public $store_image1;
	public $member_id;
	public $member_name;
	public $store_time;
	public $store_description;
	public $store_keywords;
	public $store_logo;
    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['store_name','store_tel'], 'filter', 'filter' => 'trim'],
            [['store_name','store_tel', 'sc_id','region_id', 'store_address', 'store_owner_card'], 'required'],
            ['store_name', 'unique', 'targetClass' => '\common\models\Store', 'message' => 'This store_name has already been taken.'],
            ['store_name', 'string', 'min' => 2, 'max' => 20],
            [['store_image', 'store_image1'], 'file'],
            [['store_tel', 'sc_id', 'store_zip'], 'number'],
            ['store_owner_card', 'string', 'min' => 18, 'max' => 18],
        ];
    }
    
    public function attributeLabels(){
    	return [
	    	'store_name' => '店铺名称',
	    	'sc_id' => '店铺分类',
	    	'region_id' => '所在地区',
	    	'store_address' => '详细地址',
	    	'store_tel' => '联系电话',
	    	'store_zip' => '邮编',
	    	'store_owner_card' => '身份证号',
	    	'store_image' => '上传身份证',
	    	'store_image1' => '上传执照',
	    	'store_logo' => '店铺logo',
	    	'store_description' => '店铺简介',
	    	'store_keywords' => '店铺搜索关键字'
    	];
    }
    
    public function addStore(){
        if ($this->validate()) {
            $store = new Store();
            $store->store_name = $this->store_name;
            $store->sc_id = $this->sc_id;
            $store->region_id = $this->region_id;
            $store->store_address = $this->store_address;
            $store->store_zip = $this->store_zip;
            $store->store_tel = $this->store_tel;
            $store->store_owner_card = $this->store_owner_card;
            $store->store_image = $this->store_image;
            $store->store_image1 = $this->store_image1;
            $store->member_id = Yii::$app->getUser()->identity->member_id;
            $store->member_name = Yii::$app->getUser()->identity->member_name;
            $store->store_regist_time = time();
            if($store->save()){
            	return $store;
            }
        }

        return false;
    }
    
    public function getAllStoreCate(){
    	$store_cate = new StoreCate();
    	$cateArray = array();
    	//var_dump(Yii::$app->db->createCommand("select sc_id,sc_name from store_cate where sc_parent_id=4")->queryAll());die;
    	$cates = $store_cate->find()->select(['sc_id', 'sc_name'])->where(['sc_parent_id'=>'0'])->all();
    	foreach ($cates as $item){
    		$cateArray[$item->sc_id] = $item->sc_name;
    		$subcates = $store_cate->find()->select(['sc_id', 'sc_name'])->where(['sc_parent_id'=>$item->sc_id])->all();
    		foreach ($subcates as $subItem){
    			$cateArray[$subItem->sc_id] = $subItem->sc_name;
    		}
    	}
    	return $cateArray;
    }
}
