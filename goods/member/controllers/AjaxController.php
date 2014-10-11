<?php
namespace member\controllers;

use common\models\AlbumPic;

use common\models\AlbumCate;

use common\models\Region;

use member\models\AlbumPicForm;

use yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\GoodsCate;
use components\helper\Helper;
use member\models\GoodsForm;
use components\Pz;
use yii\data\Pagination;

class AjaxController extends Controller {
	public function actions(){
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}
	
	public function behaviors(){
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['login', 'error'],
						'allow' => true,
					],
					[
						'actions' => ['upload-goods-master-img',
							'goods-cates',
							'get-region-by-parent-id', 
							'img-page'
							],
						'allow' => true,
					],
					[
						'actions' => ['logout', 'index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}
	public function actionGetRegionByParentId($parent_id) {
		if(empty($parent_id) && !intval($parent_id)) {
			return FALSE;
		}else {
			return Region::getRegionById($parent_id, FALSE);
		}
	}
	public function actionGoodsCates($parent_id) {
		if(empty($parent_id) && !intval($parent_id)) {
			return FALSE;
		}else {
			$cates = new GoodsCate();
			$cates = $cates->getCates($parent_id, FALSE);
			if(empty($cates))
				return FALSE;
			return $cates;
		}
	}
	
	public function actionUploadGoodsMasterImg() {
			$goods = new GoodsForm();
			$savePath = Yii::getAlias('@uploads') . '/'.PZ::getMember()->member_name. '/images';
			$image = Helper::uploadFile($goods, $savePath, 'goods_master_image');

			$albumCate = AlbumCate::findOne([
					'store_id' => PZ::getMember()->store_id,
					'type' => 2,
			]);
			
			$albumPic = new AlbumPic();
			$albumPic->apic_name = $image['name'];
			$albumPic->apic_tag = $image['path'];
			$albumPic->acate_id = $albumCate->acate_id;
			$albumPic->apic_cover =$image['path'];
			$albumPic->apic_size = $image['size'];
			$albumPic->apic_spec = $image['fileSize'];
			$albumPic->store_id = PZ::getMember()->store_id;
			$albumPic->upload_time = time();
			
			if($albumPic->save()) {
				$rjson['status'] = TRUE;
				$rjson['path'] = $image['path'];
			}else {
				$rjson['status'] = FALSE;
				$rjson['msg'] = '上传图片失败';
			}
			
			return json_encode($rjson);
			
	}
	
	public function actionImgPage() {		
		$query = AlbumPic::find()->where(['store_id'=>PZ::getMember()->store_id]);
		$countQuery = clone $query;
		$pages = new Pagination([
				'totalCount'=>$countQuery->count(),
				'defaultPageSize' => 10,
				'urlManager' => Yii::$app->memberUrlManager,
				]);
		$imgs = $query->offset($pages->offset)
		->limit($pages->limit)
		->all();
		return $this->render('upload', ['pages'=>$pages, 'imgs'=>$imgs]);
	}
}