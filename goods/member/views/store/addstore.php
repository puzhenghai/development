<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \frontend\models\ContactForm $model
 */
$this->title = '店铺注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript" src="/trunk/static/member/default/js/Regions.js"></script>
<section class="warp">
<div class="layout">
<div class="wrap-shadow">
<div class="wrap-all">
<div class="chart">
    <div class="pos_x1 bg_a1" title="请选择店铺分类"></div>
    <div class="pos_x2 bg_b2" title="填写店主和店铺信息"></div>
    <div class="pos_x3 bg_c" title="完成"></div>
</div>
<div class="register-store">
            <div class="ncu-form-style grade-shop">
			<?php $form = ActiveForm::begin(['id' => 'store-form','options'=>['enctype'=>'multipart/form-data']]); ?>
            	<?= $form->field($store, 'store_name') ?>
                <?= $form->field($store, 'sc_id')->dropDownList($storeCates, [])?> 
                <?= Html::activeDropDownList($store, 'region_id',$region, ['id'=>'select01'])?>
				<select name="AddStoreForm[region_id]" id="select02" style="display: none"></select> 
			    <select name="AddStoreForm[region_id]" id="select03" style="display: none"> </select>
                <?= $form->field($store, 'store_address') ?>
                <?= $form->field($store, 'store_zip') ?>
                 <?= $form->field($store, 'store_logo')->fileInput() ?>
                <?= $form->field($store, 'store_tel') ?>
                 <?= $form->field($store, 'store_keywords') ?>
                <?= $form->field($store, 'store_owner_card') ?>
                <?= $form->field($store, 'store_image')->fileInput() ?>
                <?= $form->field($store, 'store_image1')->fileInput() ?>
                <?= $form->field($store, 'store_description')->textarea() ?>
                <?= Html::submitInput('Submit', ['class' => 'btn2 btn-primary submit', 'name' => 'add-store-button']) ?>
                
            <?php ActiveForm::end(); ?>
            </div>
		<script type="text/javascript">
					$('#select01').children('option').each(function() {
						$(this).click(function() {
							$.ajax({
								url: "<?=Yii::$app->memberUrlManager->createUrl('ajax/get-region-by-parent-id') ?>",
								data: {parent_id:$(this).val()},
								dataType: "json",
								success: function(data) {
									if(data) {
										$('#select02').show();
										$('#select02').empty();
										$('#select03')
										$('#select03').hide();
										$.each(data,function(index,item){
											$('#select02').append("<option onclick=ajaxRequest(this); value='"+item.region_id+"'>"+item.region_name+"</option>");
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
							url: "<?=Yii::$app->memberUrlManager->createUrl('ajax/get-region-by-parent-id') ?>",
							data: {parent_id:$(obj).val()},
							dataType: "json",
							success: function(data) {
								if(data) {
									$('#select03').show();
									$('#select03').empty();
									$.each(data,function(index,item){
										$('#select03').append("<option value='"+item.region_id+"'>"+item.region_name+"</option>");
									});
								}
							}
						}) ;
					}
				</script>
</div>
</div>
</div>
</div>
</section>