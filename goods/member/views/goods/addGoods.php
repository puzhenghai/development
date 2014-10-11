<?php
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;
use components\PZ;

$this->registerJsFile ( '@mstatic/js/bootstrap-alert.js', [ 
		'depends' => JqueryAsset::className () 
] );

$this->registerCssFile ( '@mstatic/css/addGoods.css' );

$this->registerJsFile ( '@mstatic/js/jquery.ajaximgupload.js', [ 
		'depends' => JqueryAsset::className () 
] );

$this->registerJsFile ( '@mstatic/js/addGoods.js', [ 
		'depends' => JqueryAsset::className () 
], View::POS_END);
//$this->registerJs ( '$("#uploadFile").uploadPreview({ Img: "ImgPr", Width: 120, Height: 120 });' );
?>
<script type="text/javascript">
	$(function() {
		var url = '/goods/member/web/ajax/upload-goods-master-img.shtml';
		$('.up-lable').unbind().delegate('#uploadFile', 'change', function(){
			var id = $(this).attr('id');
			var csrf = $("input[name='_csrf']").val()
			uploadFile(url, id, csrf)
		});

		moveImg();
	});
</script>
<?php $form = ActiveForm::begin(['id' => 'add_goods', 'options'=>['class'=>'form-horizontal', 'enctype'=>'multipart/form-data'], 'enableClientValidation'=> true]); ?>
<fieldset>
	<legend>商品资料</legend>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'goods_name', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
				<?= Html::activeTextInput($goods,'goods_name', ['class'=>'input-xlarge', 'id'=>'input01', 'placeholder'=>'请输入商品标题']); ?>
				<p class="help-block">字母，数字，汉字皆可</p>
				
		</div>
			<?= Html::error($goods, 'goods_name')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'goods_serial', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
				<?= Html::activeTextInput($goods,'goods_serial', ['class'=>'input-xlarge', 'id'=>'input01', 'placeholder'=>'请输入商品编号']); ?>
			</div>
			<?= Html::error($goods, 'goods_serial')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'brand_id', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
				<?= Html::activeTextInput($goods,'brand_id', ['class'=>'input-xlarge', 'id'=>'input01', 'placeholder'=>'请输入商品品牌']); ?>
			</div>
			<?= Html::error($goods, 'brand_id')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'salenum', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
				<?= Html::activeTextInput($goods,'salenum', ['class'=>'input-xlarge', 'id'=>'input01', 'placeholder'=>'请输入商品销售总数量']); ?>
			</div>
			<?= Html::error($goods, 'salenum')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'transport_id', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
			 	<?=html::activeRadioList($goods, 'transport_id',[0=>'默认运费模板', 1=>'自定义运费模板'])?>
			</div>
			<?= Html::error($goods, 'transport_id')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'goods_transfee_charge', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
			 	<?=html::activeRadioList($goods, 'goods_transfee_charge',[0=>'为买家承担', 1=>'为卖家承担'])?>
			</div>
			<?= Html::error($goods, 'goods_transfee_charge')?>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'goods_commend', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
			 	<?=html::activeRadioList($goods, 'goods_commend',[0=>'橱窗推荐', 1=>'不推荐'])?>
			</div>
			<?= Html::error($goods, 'goods_commend')?>
	</div>
	<div class="control-group">
		<label class="control-label" for="optionsCheckbox">商品图片</label>
		<div class="controls">
			<div class="multimage-tabs">
				<span class="tab actived">本地上传</span>
				<span  class="tab">图片空间</span>
			</div>
			
			<div class="multimage-panels">
				<div class="panel">
					<label class="up-lable btn btn-primary" for="uploadFile"> 
						<?=html::activeFileInput($goods, 'goods_master_image', ['id'=>'uploadFile'])?> 选择商品图片
					</label>
		
					
				</div>
				<div class="panel" style="display: none;" id="panel-pic">
					<iframe src="http://localhost/goods/member/web/goods/test.shtml" class="ifrm" frameborder="0"></iframe>
				</div>
				<div id="demo">
						<ul>
							<?php for ($i=1; $i<6; $i++) {?>
								<li data-index=<?=$i?>>
									<div class="examp">
										<input type="hidden" value="<?=PZ::getMemberUrl(); ?>/images/pic/te-img-<?=$i?>.jpg" name="goods_master_image[]" class="hideimageurl">
										<img src="<?=PZ::getMemberUrl(); ?>/images/pic/te-img-<?=$i?>.jpg" />
										<div class="mask"></div>
			                            <div class="desc">
			                              请上传<br>
				                          商品背面图
			                             </div>
			                        </div>
									<div class="operate">
			                        	<i class="toleft">左移</i>
			                            <i class="toright">右移</i>
			                            <i class="del">删除</i>
			                        </div>
			                        <div class="preview">
			                                <input type="hidden" value="<?=PZ::getMemberUrl(); ?>/images/pic/te-img-<?=$i?>.jpg" name="goods_master_image[]" class="hideimageurl">
											<img src="<?=PZ::getMemberUrl(); ?>/images/pic/te-img-<?=$i?>.jpg">
									</div>
								</li>
							<?php }?>
							
						</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input01">商品分类</label>
		<div class="controls">
				<?= Html::activeDropDownList($goods, 'gc_id', $cates, ['id'=>'select01'])?>
				<select name="GoodsForm[gc_id]" id="select02" style="display: none">
			</select> <select name="GoodsForm[gc_id]" id="select03"
				style="display: none">
			</select>
			<script type="text/javascript">
					$('#select01').children('option').each(function() {
						$(this).click(function() {
							$.ajax({
								url: "<?=Yii::$app->memberUrlManager->createUrl('ajax/goods-cates') ?>",
								data: {parent_id:$(this).val()},
								dataType: "json",
								success: function(data) {
									if(data) {
										$('#select02').show();
										$('#select02').empty();
										$('#select03')
										$('#select03').hide();
										$.each(data,function(index,item){
											$('#select02').append("<option onclick=ajaxRequest(this); value='"+item.gc_id+"'>"+item.gc_name+"</option>");
										});
									}
								}
							}) ;
						});
					});
	
					function ajaxRequest(obj) {
						$('#select03').empty();
						$('#select03').hide();
						$.ajax({
							url: "<?=Yii::$app->memberUrlManager->createUrl('ajax/goods_cates') ?>",
							data: {parent_id:$(obj).val()},
							dataType: "json",
							success: function(data) {
								if(data) {
									$('#select03').show();
									$('#select03').empty();
									$.each(data,function(index,item){
										$('#select03').append("<option value='"+item.gc_id+"'>"+item.gc_name+"</option>");
									});
								}
							}
						}) ;
					}
				</script>
		</div>
	</div>
	<div class="control-group">
			<?=Html::activeLabel($goods, 'goods_body', ['class'=>'control-label', 'for'=>'input01'])?>
			<div class="controls">
				<?= Html::activeTextarea($goods,'goods_body', ['rows'=>3, 'id'=>'textarea', 'class'=>'input-xlarge', 'id'=>'input01', 'placeholder'=>'请输入商品内容']); ?>
				<p class="help-block">您的商品内容</p>
		</div>
		<?= Html::error($goods, 'goods_body')?>
	</div>

	<div class="control-group">
		<div class="controls">
			<?=html::submitInput('发布商品', ['class'=>'btn btn-primary',  'id'=>'add-goods'])?>
		</div>
	</div>
</fieldset>
<?php ActiveForm::end(); ?>