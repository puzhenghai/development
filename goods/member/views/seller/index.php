<?php
	use yii;
	use yii\web\JqueryAsset;
	
	$this->registerCssFile ( '@mstatic/css/seller_center.css' );
	$this->registerCssFile('@mstatic/font/font-awesome/css/font-awesome.min.css');
	$this->registerJsFile ( '@mstatic/js//seller.js', [
		'depends' => JqueryAsset::className ()
		] );
?>