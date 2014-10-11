<?php
namespace components\helper;

use yii;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use common\model\Goods;
class Helper {
	public static function uploadFile($model, $path, $fileName){
		$savePath = Yii::getAlias('@root') . $path;
		if(!file_exists($savePath)) {
			BaseFileHelper::createDirectory($savePath);
		}
		$_obj = UploadedFile::getInstance($model, $fileName);
		if(empty($_obj)){
			return;
		}
		$NewFileName = date("YmdHis") . '_' . rand(10000, 99999) . '_'. $_obj->baseName . "." .  $_obj->extension;
		$savePath =  $savePath. '/'. $NewFileName;
		if(($_obj->saveAs($savePath))){
			$size = getimagesize($savePath);
			$rjson ['name'] = $NewFileName;
			$rjson['size'] = $size[0] . 'X' . $size[1];
			$rjson['fileSize'] = filesize($savePath);
			$rjson['path'] = $path . '/'. $NewFileName;
			return $rjson;
		}else{
			return false;
		}
		
	}
	
	public static function traverse($path = '.') {
		$imgs = array();
		$current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
        while(($file = readdir($current_dir)) !== false) {
        	$sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
            if($file == '.' || $file == '..') {
            	continue;
            }else {    //如果是文件,直接输出
           		
           		array_push($imgs, substr($path.$file, 26));
           }
        }
        return $imgs;
	}
	
}
