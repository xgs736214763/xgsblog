<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('common', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.list {
	margin: 10px 0 0 20px;
	font-size: 15px;
	color: #666;
	line-height: 25px;
	text-indent: 25px;
}

ul {
	display: block;
	list-style-type: none;
	-webkit-margin-before: 1em;
	-webkit-margin-after: 1em;
	-webkit-margin-start: 0px;
	-webkit-margin-end: 0px;
	-webkit-padding-start: 40px;
}

p {
	display: block;
	-webkit-margin-before: 1em;
	-webkit-margin-after: 1em;
	-webkit-margin-start: 0px;
	-webkit-margin-end: 0px;
}

.personal-info p.text {
	font-size: 15px;
	color: #666;
	line-height: 25px;
	text-indent: 25px;
}

.personal-msg {
	padding: 10px 0 37px;
	background: #fafafc;
	border: 1px solid #f7d6e3;
	border-radius: 3px;
}

.personal-msg .list-text {
	padding: 0 20px;
}

.personal-msg .list-text li {
	font-size: 14px;
	color: #484646;
	line-height: 30px;
	padding-left: 5%;
}

h2.title-h2 {
	position: relative;
	left: -2px;
	padding-top: 5px;
}

h2.title-h2 {
	font-size: 16px;
	font-weight: 400;
	color: #333;
	padding: 2px 0 2px 10px;
	border-left: 2px solid #3472ef;
	margin: 0 0 20px 2px;
}

#xz {
	padding: 10px 0 37px;
	border: 1px solid #f7d6e3;
	border-radius: 3px;
}

#personal {
	border: 1px solid #f7d6e3;
	border-radius: 3px;
}

.font {
	font-family: cursive;
	font-size: 45px;
}
</style>

<div class="row">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-6">
				<img class="dl fl" src="/images/avatar/avatar.jpg" width="100%"
					height="404" border: none alt="小谢">
			</div>



			<div class="col-lg-6" id='xz'>
				<ul class="list">
					<li>
						<h2 class="title">一、关于小谢</h2>
						<p class="text">1.一个对于"PHP"稍有研究的，90后草根站长。</p>
						<p class="text">2.一个不折不扣的纯爷们</p>
					</li>
					<li>
						<h2 class="title">二、关于摩羯座</h2>
						<p class="text">
							摩羯座是象征着冬天开始的星座。冬天把“绝对意识”毫无保留地奉献给了摩羯座出生的人。摩羯座的人，尤其当有几个行星同时处于你的星座时，你将是一个具有现实主义思想和有抱负的人；同时你又容易被热烈的感情征服，是一个有强烈忘我精神的人。
						</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="panel"></div>
		<div class="row" id='personal'>
			<div class="col-lg-12">
				<div class="personal-info">
					<p class="text">思想决定你的高度;</p>
					<p class="text">机会从不会“失掉”，你失掉了，自有别人会得到;</p>
					<p class="text">
						不要凡事在天，守株待兔，更不要寄希望于“机会”。机会只不过是相对于充分准备而又善于创造机会的人而言的。也许，你正为失去一个机会而懊悔、埋怨的时候，机会正被你对面那个同样的“倒霉鬼”给抓住了。没有机会，就要创造机会，有了机会，就要巧妙地抓住。
					</p>

					<p class="text">不要在乎别人如何看你，要在乎你自己如何看未来，看梦想，看世界..!</p>
					<p class="text">人就得学会感恩，滴水之恩应当涌泉相报。感谢那些曾经帮助过我的人，因为有你们我才会变得如此的优秀。</p>
					<div class="row">
						<div class="col-lg-9"></div>
						<div class="col-lg-2" style='padding-right: 1%'>
							<span class="font">小谢</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-4" style='animation-name: fadeInRight;'>
		<div class="personal-msg">
			<h2 class="title-h2">个人信息</h2>
			<ul class="list-text">
				<li>姓名：谢高升</li>
				<li>工作：2015年8月</li>
				<li>Q Q：736214763</li>
				<li>职业：PHP工程师</li>
				<li>爱好：旅游、游泳</li>
				<li>喜欢的明星：刘亦菲</li>
				<li>喜欢的音乐：一次就好</li>
				<li>人生格言：现在不努力将来怎么和儿子吹牛逼！！</li>
			</ul>
		</div>

	</div>
</div>
