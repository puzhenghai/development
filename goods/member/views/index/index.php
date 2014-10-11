
<div id="right">
	<div class="pagination main-wrap">
		<!--<div>
                默认 1	<span class="badge">1</span>
                成功 2	<span class="badge badge-success">2</span>
                警告 4	<span class="badge badge-warning">4</span>
                错误 6	<span class="badge badge-error">6</span>
                信息 8	<span class="badge badge-info">8</span>
                相反 10	<span class="badge badge-inverse">10</span>
                <br>
                <div class="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>外交部警告！</strong> 不要拿法律当挡箭牌。
                </div>
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>前进进！</strong> 紧密团结在以希特勒元首为核心的纳粹党中央周围，高举国家意志和民族利益的大旗，直达人间地狱。
                </div>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>钱贱贱！</strong> 紧密团结在以胡锦涛同志为核心的党中央周围，高举科学发展观大旗，为建设有中国特色的社会主义事业前腐后继。
                </div>
                <div class="alert alert-info">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>杀尽尽！</strong> 紧密团结在以斯大林同志为核心的苏共中央周围，高举马列2B主义大旗，加速实现共产主义。
                </div>
            </div>-->
		<!--分页 start-->
		<ul style="display: none">
			<li><a href="#">前一页</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">后一页</a></li>
		</ul>
		<!--分页 end-->
		<!--交易提示-->
		<div class="business-info container">
			<div class="hd">
				<h2>交易提示</h2>
			</div>
			<div class="content">
				<dl class="focus">
					<h2>您需要立即处理的交易订单：</h2>
					<dt>近期售出：</dt>
					<dd>
						<a href="#">交易中的订单 (<strong id="tj_progressing">0</strong>)
						</a>
					</dd>
					<dt>维权提示：</dt>
					<dd>
						<a href="#">收到维权投诉 (<strong id="tj_complain">0</strong>)
						</a>
					</dd>
				</dl>
				<ul>
					<li><a href="#">待付款 (<strong id="tj_pending">0</strong>)
					</a></li>
					<li><a href="#">待发货 (<strong id="tj_shipped">0</strong>)
					</a></li>
					<li><a href="#">待收货 (<strong id="tj_shipping">0</strong>)
					</a></li>
					<li><a href="#">待评价 (<strong id="tj_evalseller">0</strong>)
					</a></li>
					<li><a href="#"> 退款 (<strong id="tj_refund">0</strong>)
					</a></li>
					<li><a href="#"> 退货 (<strong id="tj_return">0</strong>)
					</a></li>
					<li><a href="#"> 近期售出 (<strong id="tj_order30">0</strong>)
					</a></li>
				</ul>

			</div>
		</div>
	</div>
</div>
<?= $this->render('menu');?>