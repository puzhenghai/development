
<div id="right">
	<div class="pagination main-wrap">
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="home">
				<div class="business-info container">
					<div class="hd">
						<h2>出售中的商品</h2>
					</div>
					<div class="content">
						<table class="table table-striped" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th>商品名称</th>
									<th>价格</th>
									<th>发布时间</th>
									<th>是否有活动</th>
									<th>折扣价</th>
									<th>编辑</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="user in users">
									<td>母婴用品 > 婴幼食品 > 营养品</td>
									<td>100</td>
									<td>2014-10-12</td>
									<td>有的</td>
									<td>没有</td>
									<td>
										<button class="btn" ng-click="editUser(user.id)">
											<span class="glyphicon glyphicon-pencil"></span>编辑
										</button>
									</td>
								</tr>
								<tr ng-repeat="user in users">
									<td>母婴用品 > 婴幼食品 > 营养品</td>
									<td>100</td>
									<td>2014-10-12</td>
									<td>有的</td>
									<td>没有</td>
									<td>
										<button class="btn" ng-click="editUser(user.id)">
											<span class="glyphicon glyphicon-pencil"></span>编辑
										</button>
									</td>
								</tr>
								<tr ng-repeat="user in users">
									<td>母婴用品 > 婴幼食品 > 营养品</td>
									<td>100</td>
									<td>2014-10-12</td>
									<td>有的</td>
									<td>没有</td>
									<td>
										<button class="btn" ng-click="editUser(user.id)">
											<span class="glyphicon glyphicon-pencil"></span>编辑
										</button>
									</td>
								</tr>
								<tr ng-repeat="user in users">
									<td>母婴用品 > 婴幼食品 > 营养品</td>
									<td>100</td>
									<td>2014-10-12</td>
									<td>有的</td>
									<td>没有</td>
									<td>
										<button class="btn" ng-click="editUser(user.id)">
											<span class="glyphicon glyphicon-pencil"></span>编辑
										</button>
									</td>
								</tr>
								<tr ng-repeat="user in users">
									<td>母婴用品 > 婴幼食品 > 营养品</td>
									<td>100</td>
									<td>2014-10-12</td>
									<td>有的</td>
									<td>没有</td>
									<td>
										<button class="btn" ng-click="editUser(user.id)">
											<span class="glyphicon glyphicon-pencil"></span>编辑
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<button class="btn btn-success" ng-click="editUser('new')">
					<span class="glyphicon glyphicon-user"></span>发布商品
				</button>
			</div>
			<div class="tab-pane fade" id="profile">
				<p>
					法国代表社会党参选的奥朗德今晨在大选中获得胜利，成为法兰西第五共和国第七位总统，法国也在17年之后迎来首位左翼总统。萨科齐在5年任内因政绩不佳引发不满，选前处于民调落后的劣势。萨科齐虽试图打造“危机总统”形象，但终未能实现逆转。奥朗德现年58岁，至今未婚，与社会党前总统选举候选人罗亚尔同居30多年，育有4子女，多年来坚持骑车上下班。对华关系持强硬立场。
				</p>
			</div>
			<div class="tab-pane fade" id="dropdown1">
				<p>
					平壤某鱼肉样板店经理日云硕（音），在去年金正日和金正恩来店视察时，曾目睹这样一幕：金正恩将父亲让进电梯，然后自己嗖嗖地爬上三层楼梯，电梯再次打开时，他立正向父亲致意。日云硕动情地回忆说：“我被他的忠诚与智慧折服了...”
				</p>
			</div>
			<div class="tab-pane fade" id="dropdown2">
				<p>
					不是政府人士，永远不要去做政府的吹鼓手，因为吹鼓手在政府眼里永远只值一个夜壶铜钿，尿急了拿出来用一下，用完了将夜壶放到最角落地方；你吹得越起劲，不仅公众看不起你，政府更看不起你，所以吹鼓手都没有好下场。-----杜月笙
				</p>
			</div>
		</div>
	</div>
</div>
<?= $this->render('@member/views/index/menu');?>