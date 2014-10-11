<?php
use yii;
use yii\widgets\LinkPager;
?>
<div class="goods-gallery">
	<div class="nav"><span class="l">用户相册 &gt; 全部图片</span><span class="r">
    <select style="width:100px;" id="jumpMenu" name="jumpMenu">
    <option style="width:80px;" value="0">-请选择-</option>
        <option value="4" style="width:80px;">默认相册</option>
        </select>
    </span></div>
  <div>
  	  <ul class="list">
  	<?php 
  		foreach ($imgs as $img){
  			echo "<li onclick=insert_img('".$img->apic_name."','".$img-> apic_cover."')><a href='javascript:void(0);'><span class='thumb size90'><i></i><img src='{$img-> apic_cover}'/></span></a></li>";
  		}
  	?>
  	</ul>
  </div>
  <div>
  		
  		<?=LinkPager::widget([
       		'pagination' => $pages,
       		'linkOptions'=>['class'=>'demo',],
	 	])?>
  </div>
  
  </div>

  <script type="text/javascript">
$(document).ready(function(){
	$('.demo').ajaxContent({
		event:'click', //mouseover
		loaderType:'img',
		loadingMsg:'http://xuewei/shop/templates/default/images/loading.gif',
		target:'#demo'
	});
	$('#jumpMenu').change(function(){
		$('#select_submit').attr('href',$('#select_submit').attr('href')+"&id="+$('#jumpMenu').val());
		$('.sample_demo').ajaxContent({
			event:'click', //mouseover
			loaderType:'img',
			loadingMsg:'http://xuewei/shop/templates/default/images/loading.gif',
			target:'#demo'
		});
		$('#select_submit').click();
	});
});
</script>