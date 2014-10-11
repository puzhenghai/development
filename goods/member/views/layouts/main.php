<?php
use member\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register ( $this );
$menulist = AppAsset::getMenuList();
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="utf-8">
	    <?php $this->head()?>
		<title><?= $this->title ?></title>
</head>

<body>
	<header class="ncsc-head-layout w">
		<div class="wrapper">
			<div class="ncsc-admin">
				<dl class="ncsc-admin-info">
					<dt class="admin-avatar">
						<img width="32" alt="" class="pngFix"
							src="http://xuewei/shopb2c/data/upload/shop/common/default_user_portrait.gif">
					</dt>
					<dd class="admin-permission">当前用户</dd>
					<dd class="admin-name"><?=Html::encode(yii::$app->getUser()->identity->member_name)?></dd>
				</dl>
				<div class="ncsc-admin-function">
					<a title="前往店铺" target="_blank"
						href="http://xuewei/shopb2c/shop/index.php?act=show_store&amp;op=index&amp;store_id=1"><i
						class="icon-home"></i></a><a target="_blank" class="pr"
						title="站内消息"
						href="http://xuewei/shopb2c/shop/index.php?act=home&amp;op=message"><i
						class="icon-envelope-alt"></i><em>0</em></a><a target="_blank"
						title="修改密码"
						href="http://xuewei/shopb2c/shop/index.php?act=home&amp;op=passwd"><i
						class="icon-wrench"></i></a><a title="安全退出"
						href="http://xuewei/shopb2c/shop/index.php?act=seller_logout&amp;op=logout"><i
						class="icon-signout"></i></a>
				</div>
			</div>
			<div class="center-logo">
				<a target="_blank" href="http://xuewei/shopb2c/shop"><img alt=""
					class="pngFix"
					src="http://xuewei/shopb2c/data/upload/shop/common/seller_center_logo.png"></a>
				<h1>商家中心</h1>
			</div>
			<div class="index-search-container">
				<div class="index-sitemap">
					<a href="javascript:void(0);">导航管理 <i class="icon-angle-down"></i></a>
					<div class="sitemap-menu-arrow"></div>
					<div class="sitemap-menu">
						<div class="title-bar">
							<h2>
								<i class="icon-sitemap"></i>管理导航<em>小提示：添加您经常使用的功能到首页侧边栏，方便操作。</em>
							</h2>
							<span class="close" id="closeSitemap">X</span>
						</div>
						<div class="content" id="quicklink_list">
							<?php foreach ($menulist as $k=>$v) {?>
								<dl>
									<dt><?=$v['name'] ?></dt>
									<?php foreach($v['child'] as $ck=>$cv) {?>
										<dd class="selected">
											<i title="添加为常用功能菜单" class="icon-check"
												data-quicklink-act="store_goods_online"
												nctype="btn_add_quicklink"></i><a
												href="<?=Yii::$app->memberUrlManager->createUrl($cv['controller'].'/'.$cv['action']) ?>"> <?=$cv['name'] ?> </a>
										</dd>
									<?php }?>
								</dl>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="search-bar">
					<form target="_blank" method="get">
						<input type="hidden" value="search" name="act"> <input type="text"
							class="search-input-text" placeholder="商城商品搜索" name="keyword"
							nctype="search_text"> <input type="submit" value=""
							class="search-input-btn pngFix" nctype="search_submit">
					</form>
				</div>
			</div>
			<nav class="ncsc-nav">
				<dl class="current">
					<dt>
						<a href="<?=Yii::$app->memberUrlManager->createUrl('seller/index') ?>">首页</a>
					</dt>
					<dd class="arrow"></dd>
				</dl>
				<?php foreach ($menulist as $k=>$v) {?>
					<dl class="">
						<dt>
							<a href="index.php?act=store_goods_add&amp;op=index"><?=$v['name'] ?></a>
						</dt>
						<dd>
							<ul>
								<?php foreach($v['child'] as $ck=>$cv) {?>
									<li><a href="<?=Yii::$app->memberUrlManager->createUrl($cv['controller'].'/'.$cv['action']) ?>"><?=$cv['name'] ?></a></li>
								<?php }?>
							</ul>
						</dd>
						<dd class="arrow"></dd>
					</dl>
				<?php }?>
			</nav>
		</div>
	</header>
    <?php $this->beginBody()?>
        <?= $content?>
    <?php $this->endBody()?>
    <footer>bootom</footer>
</body>
</html>
<?php $this->endPage()?>
