<?php
namespace member\models;

use common\models\Goods;
use yii\base\Model;
use Yii;

class GoodsForm extends Model {
	public $goods_serial;
	public $goods_name;
	public $brand_id;
	public $gc_id;
	public $store_id;
	public $goods_price;
	public $goods_keywords;
	public $transport_id;
	public $goods_transfee_charge;
	public $goods_state;
	public $goods_commend;
	public $goods_body;
	public $goods_starttime;
	public $salenum;
	public $goods_master_image;
    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['goods_name'], 'filter', 'filter' => 'trim'],
            [['goods_name'], 'required', 'message'=> "商品名称不能为空"],
            ['goods_name', 'string', 'min' => 3, 'max' => 80, 'message'=> '长度最小是3位最大80位'],
        ];
    }
    
    public function attributeLabels(){
    	return [
    	'goods_name' => '商品名称',
    	'gc_id' => '商品类型',
    	'goods_serial' => '商品编号',
    	'goods_price' => '商品价格',
    	'brand_id' => '商品品牌',
    	'goods_price' => '商品价格',
    	'goods_keywords' => '商品关键字',
    	'transport_id' => '运费模板',
    	'goods_transfee_charge' => '运费承担方式',
    	'goods_state' => '商品状态',
    	'goods_commend' =>  '是否推荐',
    	'goods_body' => '商品内容',
    	'salenum' => '商品数量',
    	];
    }
    
    public function addGoods(){
        if ($this->validate()) {
            $goods = new Goods();
            $goods->goods_name = $this->goods_name;
            if($goods->save()){
            	return $goods;
            }
        }

        return false;
    }
   
}
