<?php

namespace member\controllers;

use yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use member\models\SignupForm;
use member\models\LoginForm;
use common\models\Store;
use common\models\member;
use member\models\AddStoreForm;
use components\PZ;
use common\models\Region;

class IndexController extends Controller{
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
						'actions' => ['test'],
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
	public function actionIndex(){
		$view = PZ::getView();
		//var_dump($view);die;
		$view->setTitle('欢迎来到会员中心');
		return $this->render('index');
	}
	
	public function actionTest() {
		var_dump(PZ::getMember()->member_name);
	}
}
