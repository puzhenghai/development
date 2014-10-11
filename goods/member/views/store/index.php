<?php
	use yii;
	use yii\web\JqueryAsset;
	
	$this->registerCssFile ( '@mstatic/css/seller_center.css' );
	$this->registerJsFile ( '@mstatic/js//seller.js', [
		'depends' => JqueryAsset::className ()
		] );
?>