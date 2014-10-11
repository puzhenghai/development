<?php
namespace member\controllers;

use common\models\AlbumCate;

use common\models\AlbumPic;

use member\models\AlbumPicForm;

use yii;
use yii\web\Controller;
use components\PZ;
use common\models\Region;
use common\models\GoodsCate;
use yii\filters\AccessControl;
use member\models\GoodsForm;
use yii\data\Pagination;

class GoodsController extends Controller{
	
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
					'actions' => ['add','test'],
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
	
	public function actionAdd() {
		$view = PZ::getView();
		$view->setTitle('商品发布中心');
		$resion = Region::getRegionById();
		$goodsCate = new GoodsCate();
		$cates = $goodsCate->getCates();
		$goods = new GoodsForm();
		if($goods->load(Yii::$app->request->post())) {
			
		}
		return $this->render('addGoods', ['region' => $resion, 'cates' => $cates, 'goods'=>$goods]);
	}
	
	public function actionSale() {
		return $this->render('saleGoods');
	}
	
	public function actionTest() {
		echo \Yii::t('app', 'english');
	}
	
}
