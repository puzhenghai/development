<?php

namespace member\controllers;

use yii;
use yii\web\Controller;
use common\models\Store;
use member\models\AddStoreForm;
use components\helper\Helper;
use common\models\Member;
use common\models\Region;
use components\PZ;


class StoreController extends Controller{
	public function actionIndex(){
		return $this->render('index');
	}
	
	
	
	public function actionTest(){
		$store = new Store();
		$re = $store->findOne(['store_id' => '1']);
		if(!Yii::$app->user->isGuest){
			$member = Yii::$app->getUser();
		}
	}
	
	public function actionAddStore(){
		$member = Member::findOne(Yii::$app->getUser()->identity->member_id);
		if(empty($member->store_id)) {
			$store = new AddStoreForm();
			$storecates = $store->getAllStoreCate();
			$savePath = Yii::getAlias('@uploads') . '/'.PZ::getMember()->member_name. '/images';
			$regions = Region::getRegionById();	
			if ($store->load(Yii::$app->request->post())) {
				$ustatus = Helper::uploadFile($store, $savePath, 'store_image');
				$zstatus =  Helper::uploadFile($store, $savePath, 'store_image1');
				
				if($ustatus){
					$store->store_image = $ustatus['path'];
				}
				if($zstatus){
					$store->store_image1 = $zstatus['path'];
				}
				$sstore = $store->addStore();
				if($sstore){
					$member->store_id = $sstore->store_id;
					$member->save();
					return $this->redirect('/goods/frontend/web');
				}
			}
			return $this->render('addstore', ['store' => $store, 'storeCates' => $storecates, 'region' => $regions]);
		} else {
			return $this->redirect('/goods/member/web');
		}
	}
	
}
