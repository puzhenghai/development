<?php 
	use yii;
?>
    <div class="layout">
<div class="main">
<div class="wrap">
<div class="open-store">
<h1>欢迎来到您我商城系统卖家中心</h1>
<h3>您现在还没有店铺，无法对卖家中心功能进行操作，您可以：</h3>
<div><em></em>
<dl>
<dt><a href="<?=Yii::$app->memberUrlManager->createUrl('store/addstore') ?>">马上开店&nbsp;›</a></dt>
<dd>选择店铺等级并填写相关信息，即可开设您的店铺。</dd>
</dl>
</div>
</div>
</div>
</div>
</div>
