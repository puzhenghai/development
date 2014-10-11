<?php
/**
 * @link http://www.yiiframework.com/
 * @cactionyright Cactionyright (c] 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace member\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@mstatic';
    public $css = [
		'css/base.css'
    ];
    public $js = [
    	//'js/site.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
    
    public static function getMenuList() {
    	$menu_list = [
    		'goods' => ['name' => '商品', 'child' => [
    			['name' => '商品发布', 'controller'=>'store_goods_add', 'action'=>'index'],
    			['name' => '出售中的商品', 'controller'=>'store_goods_online', 'action'=>'index'],
    			['name' => '仓库中的商品', 'controller'=>'store_goods_offline', 'action'=>'index'],
    			['name' => '库存警报', 'controller'=>'store_storage_alarm', 'action' => 'index'],
    			['name' => '关联板式', 'controller'=>'store_plate', 'action'=>'index'],
    			['name' => '商品规格', 'controller' => 'store_spec', 'action' => 'index'],
    			['name' => '图片空间', 'controller'=>'store_album', 'action'=>'album_cate'],			
    		]],
    		'order' => ['name' => '订单', 'child' => [
    			['name' => '订单管理', 'controller'=>'store_order', 'action'=>'index'],
    			['name' => '发货', 'controller'=>'store_deliver', 'action'=>'index'],
    			['name' => '发货设置', 'controller'=>'store_deliver_set', 'action'=>'daddress_list'],
    			['name' => '评价管理', 'controller'=>'store_evaluate', 'action'=>'list'],
    			['name' => '打印设置', 'controller'=>'store_printsetup', 'action'=>'index'],
    		]],
    		'promotion' => ['name' => '促销', 'child' => [
    			['name' => '团购管理', 'controller'=>'store_groupbuy', 'action'=>'index'],
    			['name' => '限时折扣', 'controller'=>'store_promotion_xianshi', 'action'=>'xianshi_list'],
    			['name' => '满即送', 'controller'=>'store_promotion_mansong', 'action'=>'mansong_list'],
    			['name' => '优惠套装', 'controller'=>'store_promotion_bundling', 'action'=>'bundling_list'],
    			['name' => '推荐展位', 'controller' => 'store_promotion_booth', 'action' => 'booth_goods_list'],
    			['name' => '代金券管理', 'controller'=>'store_voucher', 'action'=>'templatelist'],
    			['name' => '活动管理', 'controller'=>'store_controllerivity', 'action'=>'store_controllerivity'],
    		]],
    		'store' => ['name' => '店铺', 'child' => [
    			['name' => '店铺设置', 'controller'=>'store_setting', 'action'=>'store_setting'],
    			['name' => '店铺导航', 'controller'=>'store_navigation', 'action'=>'navigation_list'],
    			['name' => '店铺动态', 'controller'=>'store_sns', 'action'=>'index'],
    			['name' => '店铺信息', 'controller'=>'store_info', 'action'=>'store_info'],
    			['name' => '店铺分类', 'controller'=>'store_goods_class', 'action'=>'index'],
    			['name' => '品牌申请', 'controller'=>'store_brand', 'action'=>'brand_list'],
    		]],
    		'transport' => ['name' => '物流', 'child' => [
    			['name' => '物流工具', 'controller'=>'store_transport', 'action'=>'index'],
    			['name' => '免运费额度', 'controller'=>'store_free_freight', 'action'=>'index'],
    		]],
    		'consult' => ['name' => '客服', 'child' => [
    			['name' => '客服设置', 'controller'=>'store_callcenter', 'action'=>'index'],
    			['name' => '咨询管理', 'controller'=>'store_consult', 'action'=>'consult_list'],
    			['name' => '投诉管理', 'controller'=>'store_complain', 'action'=>'list'],
    		]],
    		'service' => ['name' => '售后', 'child' => [
    			['name' => '退款记录', 'controller'=>'store_refund', 'action'=>'index'],
    			['name' => '退货记录', 'controller'=>'store_return', 'action'=>'index'],
    		]],
    		'settle' => ['name' => '结算', 'child' => [
    			['name' => '结算管理', 'controller'=>'store_bill', 'action'=>'index'],
    		]],
    		'statistics' => ['name' => '统计', 'child' => [
    			['name' => '流量统计', 'controller'=>'statistics_flow', 'action'=>'flow_statistics'],
    			['name' => '销量统计', 'controller'=>'statistics_sale', 'action'=>'sale_statistics'],
    			['name' => '购买率统计', 'controller'=>'statistics_probability', 'action'=>'probability_statistics'],
    		]],
    		'account' => ['name' => '帐号', 'child' => [
    			['name' => '帐号列表', 'controller'=>'store_account', 'action'=>'account_list'],
    			['name' => '帐号组', 'controller'=>'store_account_group', 'action'=>'group_list'],
    			['name' => '帐号日志', 'controller'=>'seller_log', 'action'=>'log_list'],
    			['name' => '店铺消费', 'controller'=>'store_cost', 'action'=>'cost_list'],
    		]]
    	];
    	return $menu_list;
    }
}
