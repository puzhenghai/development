<?php
use Yii;
use yii\web\MemberUrlManager;
use yii\bootstrap\BootstrapAsset;
$this->registerCssFile ('@mstatic/css/addGoods.css', ['depends' => BootstrapAsset::className() ]);
?>
<section class="h warp">
	<div class="warp" id="header">Logo</div>
	<ul class="flow-chart">
		<li class="step a1" title="选择商品所在分类"></li>
		<li class="step b2" title="填写商品详细信息"></li>
		<li class="step c2" title="商品发布成功"></li>
	</ul>

	<div class="wrapper_search">
		<div class="wp_search_result" style="display: none;">
			<div class="back_to_sort"></div>
			<div class="no_result" id="searchNone" style="display: none;">
				<div class="cont">
					<p>没有找到相关的商品分类。</p>

					<p>
						<a href="JavaScript:void(0);" nc_type="return_choose_sort">
							<button>返回商品分类选择</button>
						</a>
					</p>
					<p></p>
				</div>
			</div>
			<div class="has_result" id="searchLoad" style="display: none;">
				<div class="loading">
					<img src="http://ftp171760.host154.mymyweb.net/templates/default/images/loading.gif" alt="loading..."><span class="txt_searching">搜索中...</span>
				</div>
			</div>
			<div class="has_result" id="searchSome" style="display: none;">
				<div id="searchEnd"></div>
				<div class="result_list" id="searchList">
					<ul>
					</ul>
				</div>
			</div>
		</div>
		<div class="wp_sort" style="position: relative;">
			<div id="dataLoading" class="wp_data_loading" style="display: none;">
				<div class="data_loading">加载中...</div>
			</div>
			<div class="sort_selector">
				<div class="sort_title">
					<div class="txt">您常用的商品分类：</div>
					<input type="text" class="select_box" id="commSelect" value="请选择">
				</div>
			</div>
			<div class="select_list" id="commListArea" style="cursor: pointer; height: 280; overflow: auto; display: none;">
				<ul>
					<li id="select_list_no"><span class="title">您还没有添加过常用的分类</span></li>
				</ul>
			</div>
			<div id="class_div" class="wp_sort_block">
				<div class="sort_list">
					<div class="wp_category_list">
						<div id="class_div_1" class="category_list">
							<ul>
            					 <li class="" onclick="selClass(this,1000);" id="1000|1|0"><a class="classDivClick" href="javascript:void(0)"><spanclass="has_leaf">餐饮美食</spanclass="has_leaf"></a></li> <li class="" onclick="selClass(this,1007);" id="1007|1|0"><a class="" href="javascript:void(0)"><spanclass="has_leaf">休闲娱乐</spanclass="has_leaf"></a></li> <li class="" onclick="selClass(this,1010);" id="1010|1|0"><a class="" href="javascript:void(0)"><spanclass="has_leaf">电影演出</spanclass="has_leaf"></a></li> <li class="" onclick="selClass(this,1012);" id="1012|1|0"><a class="" href="javascript:void(0)"><spanclass="has_leaf">商场超市</spanclass="has_leaf"></a></li>                              
                             </ul>
						</div>
					</div>
				</div>
				<div class="sort_list">
					<div class="wp_category_list">
						<div id="class_div_2" class="category_list">
							<ul><li id="1001|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class="classDivClick"><span class="has_leaf">小吃快餐</span></a></li><li id="1002|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class=""><span class="has_leaf">火锅</span></a></li><li id="1003|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class=""><span class="has_leaf">自助餐</span></a></li><li id="1004|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class=""><span class="has_leaf">川菜</span></a></li><li id="1005|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class=""><span class="has_leaf">甜品饮品</span></a></li><li id="1006|2|undefined" onclick="selClass(this);"><a href="javascript:void(0)" class=""><span class="has_leaf">日本料理</span></a></li></ul>
						</div>
					</div>
				</div>
				<div class="sort_list">
					<div class="wp_category_list blank">
						<div id="class_div_3" class="category_list">
							<ul></ul>
						</div>
					</div>
				</div>
				<div class="sort_list sort_list_last">
					<div class="wp_category_list blank">
						<div id="class_div_4" class="category_list ">
							<ul></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tips_choice warp" style="display: block; clear: both;">
			<span class="tips_zt"></span>
			<dl class="hover_tips_cont">
				<dt id="commodityspan" style="display: none;">
					<span style="color: #F00;">请选择商品类别</span>
				</dt>
				<dt id="commoditydt" style="" class="current_sort">您当前选择的商品类别是：</dt>
				<dd id="commoditydd"><span class="has_leaf">餐饮美食</spanclass="has_leaf">&nbsp;&gt;&nbsp;<span class="has_leaf">小吃快餐</span></dd>
				<dd id="commoditya" style="">
					&nbsp;&nbsp;<a href="JavaScript:void(0);">[添加到常用分类]</a>
				</dd>
			</dl>
		</div>
		<div class="wp_confirm">
			<span class="btn_confirm">
				<form action="/trunk/member/web/goods/add_goods.shtml" method="get">
					<input type="hidden" name="step" value="two"> <input type="hidden" name="good_cate_id" id="good_cate_id" value=""> <input type="hidden" value="1001" id="class_id" name="class_id"> <input type="submit" id="button_next_step" value="下一步" class="submit" style="cursor: pointer;">
				</form>
			</span>
		</div>
	</div>
</section>