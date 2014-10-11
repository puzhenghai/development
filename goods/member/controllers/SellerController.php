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

class SellerController extends Controller{
	
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
					'actions' => ['index'],
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
	
	public function actionIndex() {
		return $this->render('index');
	}
}