<?php 
	use yii\web\JqueryAsset;
	use yii\web\View;
	$this->registerJsFile('@mstatic/js/bootstrap-collapse.js', ['depends' => JqueryAsset::className(),], View::POS_HEAD);
	$this->registerJsFile('@mstatic/js/bootstrap-dropdown.js', ['depends' => JqueryAsset::className(),], View::POS_HEAD);
?>
<!--左侧栏目 start-->
<div id="left">
	<div class="accordion" id="accordion2">
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#accordion2" href="#collapseOne"> 商品管理 </a>
			</div>
			<div id="collapseOne" class="accordion-body collapse"
				style="height: 0px;">
				<div class="accordion-inner">
					<ul>
						<li><a href="<?=Yii::$app->memberUrlManager->createUrl('goods/add') ?>">商品发布</a></li>
						<li><a href="<?=Yii::$app->memberUrlManager->createUrl('goods/sale') ?>">出售中的商品</a></li>
						<li><a href="#">分类管理</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#accordion2" href="#collapseTwo"> 交易管理 </a>
			</div>
			<div id="collapseTwo" class="accordion-body collapse">
				<div class="accordion-inner">
					<ul>
						<li><a href="#">订单管理</a></li>
						<li><a href="#">发货管理</a></li>
						<li><a href="#">评价管理</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#accordion2" href="#collapseThree"> 促销管理 </a>
			</div>
			<div id="collapseThree" class="accordion-body collapse">
				<div class="accordion-inner">
					<ul>
						<li><a href="#">团购管理</a></li>
						<li><a href="#">限时折扣</a></li>
						<li><a href="#">优惠券管理</a></li>
						<li><a href="#">活动管理</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--左侧栏目 end-->