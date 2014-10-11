<?php
use yii;
use yii\web\JqueryAsset;
use yii\widgets\LinkPager;
use yii\web\View;

$this->registerJsFile ( '@mstatic/js/addGoods.js', [
		'depends' => JqueryAsset::className ()
		], View::POS_END);
?>
<div id="content">
  	  <ul class="list">
	  	<?php 
	  		foreach ($imgs as $img){
	  			echo "<li><a href='javascript:void(0);'><img data-type=1 width=70 height=70 src='{$img-> apic_cover}'/></a></li>";
	  		}
	  	?>
  	</ul>
	<div class="page_nav">
	  		
	  		<?=LinkPager::widget([
	       		'pagination' => $pages,
	       		'linkOptions'=>['class'=>'demo'],
		 	])?>
	 </div>
</div>	 
<script type="text/javascript">
	$(function() {
		$('.list').children('li').each(function (index, item) {
			$(item).children('a').click(function() {
				var src = $(item).find('img').attr('src');
				insertImg({path:src});
			});
		});
	})
</script>

<style type="text/css">
	#content {
		height: 250px;
		widht: 600px;
	}
	ul {
		list-style: none;
		width: 600px;
	}	  	
	
	ul li {
		float: left;
		margin: 0 10px;
	}
	
	.page_nav {
		clear: both;
	}
</style>