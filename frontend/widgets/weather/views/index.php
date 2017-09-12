<?php
use yii\helpers\Url;

?>
<style>
.w10, .w11, .w12, .w13, .w14, .w16, .w19, .w20, .w26, .w28, .w32, .w37,
	.w39, .w40, .w41, .w42, .w60, .w61, .w62, .w63, .w64, .w65 {
	width: 32px;
	height: 32px;
	display: block;
	background: url(../images/w_day.png) no-repeat
}

.wnt {
	background: url(../images/w_night.png) no-repeat
}

.w10 {
	background-position: 0px 0px
}

.w11 {
	background-position: -40px 0px
}

.w12 {
	background-position: -80px 0px
}

.w13 {
	background-position: -120px 0px
}

.w14 {
	background-position: -160px 0px
}

.w16 {
	background-position: 0px -32px
}

.w19 {
	background-position: -40px -32px
}

.w20 {
	background-position: -80px -32px
}

.w26 {
	background-position: -120px -32px
}

.w28 {
	background-position: -160px -32px
}

.w32 {
	background-position: 0px -64px
}

.w37 {
	background-position: -40px -64px
}

.w39 {
	background-position: -80px -64px
}

.w40 {
	background-position: -120px -64px
}

.w41 {
	background-position: -160px -64px
}

.w42 {
	background-position: 0px -96px
}

.w60 {
	background-position: -40px -96px
}

.w61 {
	background-position: -80px -96px
}

.w62 {
	background-position: -120px -96px
}

.w63 {
	background-position: -160px -96px
}

.w64 {
	background-position: 0px -128px
}

.w65 {
	background-position: -40px -128px
}

.w10_l, .w11_l, .w12_l, .w13_l, .w14_l, .w16_l, .w19_l, .w20_l, .w26_l,
	.w28_l, .w32_l, .w37_l, .w39_l, .w40_l, .w41_l, .w42_l, .w60_l, .w61_l,
	.w62_l, .w63_l, .w64_l, .w65_l {
	width: 55px;
	height: 45px;
	display: block;
	background: url(../images/w_day_l.png) no-repeat
}

.wnt_l {
	background: url(../images/w_night_l.png) no-repeat
}

.w10_l {
	background-position: 0px 0px
}

.w11_l {
	background-position: -60px 0px
}

.w12_l {
	background-position: -120px 0px
}

.w13_l {
	background-position: -180px 0px
}

.w14_l {
	background-position: -240px 0px
}

.w16_l {
	background-position: 0px -45px
}

.w19_l {
	background-position: -60px -45px
}

.w20_l {
	background-position: -120px -45px
}

.w26_l {
	background-position: -180px -45px
}

.w28_l {
	background-position: -240px -45px
}

.w32_l {
	background-position: 0px -90px
}

.w37_l {
	background-position: -60px -90px
}

.w39_l {
	background-position: -120px -90px
}

.w40_l {
	background-position: -180px -90px
}

.w41_l {
	background-position: -240px -90px
}

.w42_l {
	background-position: 0px -135px
}

.w60_l {
	background-position: -60px -135px
}

.w61_l {
	background-position: -120px -135px
}

.w62_l {
	background-position: -180px -135px
}

.w63_l {
	background-position: -240px -135px
}

.w64_l {
	background-position: 0px -180px
}

.w65_l {
	background-position: -60px -180px
}

.stitle {
	padding-left: 5px;
	font-size: 19px;
	color: black;
	padding-top: 5px;
}
</style>
<div class="fright">
	<div class="module weather_detail">
		<div id="weatherInfo" style="">
			<div class="btitle">
				<h2><?=$city ?>市天气预报</h2>
			</div>
			<div class="bmeta">
			<?php if(Yii::$app->request->get('type') == 'more'):?>
					<div class="row">
					<div class="col-lg-12">
							<?php foreach ($data as $list):?>
								<div class="stitle"><?=$list['date'] ?>&nbsp;
									<span style='color: #5BC0DE'><?=$list['type'] ?></span> <span
								style='font-family: cursive;'>&nbsp;<?=$list['fx'] ?></span>
						</div>
						<div class="panel"></div>
							<?php endforeach;?>
						</div>
				</div>
			<?php else:?>
				<div class="days2">
					<div class="row">
						<div class="stitle">
							<span style='padding-left: 5%'>今天</span>&nbsp;&nbsp;<?=$data[$i]['date'] ?></div>
						<div class="panel"></div>
						<div class="col-lg-8" style='padding-left: 20%'>
							<div class="icon">
								<span id="dayIcon" class="<?=$data[$i]['icon'] ?>"></span>
							</div>
							<div class="phrase">
								<em>天气:</em><span id="dayTxt"><?=$data[$i]['type'] ?></span>
							</div>
						</div>

					</div>
					<div class='panel'></div>
					<div class="row" style='padding-left: 20%'>
						<div class="temperature">
							<span class="low" id="lowT"><?=$data[$i]['low'] ?></span>～<span
								class="high" id="highT"><?=$data[$i]['high'] ?></span>
						</div>


						<div class="panel" style='padding-top: 5px'>风向:<?=$data[$i]['fx'] ?></div>
						<div class="panel" style='padding-top: 5px'>
							<span style='color: red'>温馨提醒:<?=$data[$i]['notice'] ?></span>
						</div>
						<a class="layer today-layer" href="/today-58362.htm"
							target="_blank" id="todayHref"></a>
					</div>
				</div>
				<div class="panel"></div>
				<?php endif;?>
				<div class="row">
					<div class="col-lg-12" style='padding-left: 7%'>
						<a href="<?=Url::to(['site/index','type'=>'more']) ?>"><div
								class="btn-more btn btn-info btn-block btn-post">查看7日天气预报</div></a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>