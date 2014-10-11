<?php
use yii;
use yii\widgets\LinkPager;
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
	       		'linkOptions'=>['class'=>'demo',],
		 	])?>
	 </div>
</div>	 
<script type="text/javascript">
	$(function() {
		//reSizeImg();
	})
</script>

<style type="text/css">
	#content {
		height: 500px;
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