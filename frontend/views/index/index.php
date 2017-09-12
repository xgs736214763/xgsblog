﻿<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<!--/.NAVBAR END-->

<section id="home" class="text-center">

	<div id="carousel-example" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner">
			<div class="item active">

				<img src="<?= Html::img('assets/img/1.jpg')?>" alt="" />
				<div class="carousel-caption">
					<h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem
						risu suspend lacinia elementum nunc.</h4>
				</div>
			</div>
			<div class="item">
				<img src="assets/img/2.jpg" alt="" />
				<div class="carousel-caption ">
					<h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem
						risu suspend lacinia elementum nunc.</h4>
				</div>
			</div>
			<div class="item">
				<img src="assets/img/3.jpg" alt="" />
				<div class="carousel-caption ">
					<h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem
						risu suspend lacinia elementum nunc.</h4>
				</div>
			</div>
		</div>

		<ol class="carousel-indicators">
			<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example" data-slide-to="1"></li>
			<li data-target="#carousel-example" data-slide-to="2"></li>
		</ol>
	</div>

</section>
<!--/.SLIDESHOW END-->

<div class="copyrights">
	Collect from <a href="http://www.cssmoban.com/" title="网站模板">网站模板</a>
</div>
<section id="intro">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">

				<div class="row text-center pad-row  ">
					<div class="col-md-4 col-sm-4 ">
						<img class="img-circle" src="assets/img/team1.png" alt="" />
						<h3>
							<strong>Jhon Deo Alex</strong>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem
							ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a href="#" class="btn btn-primary">Read Details</a>
					</div>
					<div class="col-md-4 col-sm-4 ">
						<img class="img-circle" src="assets/img/team2.jpg" alt="" />
						<h3>
							<strong>Jhon Deo Alex</strong>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem
							ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a href="#" class="btn btn-primary">Read Details</a>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="alert alert-success">
							<div class="skill-name">CLIENT SATISFACTION 100%</div>
							<div class="progress progress-striped active progress-adjust">
								<div class="progress-bar progress-bar-primary"
									role="progressbar" aria-valuenow="100" aria-valuemin="0"
									aria-valuemax="100" style="width: 100%">
									<span class="sr-only">100% Complete</span>
								</div>
							</div>
						</div>
						<div class="alert alert-danger">
							<div class="skill-name">PERFORMANCE DELIVERED 100%</div>
							<div class="progress progress-striped active progress-adjust">
								<div class="progress-bar progress-bar-danger" role="progressbar"
									aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
									style="width: 100%">
									<span class="sr-only">100% Complete</span>
								</div>
							</div>
						</div>
						<div class="alert alert-info">
							<div class="skill-name">DELIVERY DONE 100%</div>
							<div class="progress progress-striped active progress-adjust">
								<div class="progress-bar progress-bar-info" role="progressbar"
									aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
									style="width: 100%">
									<span class="sr-only">100% Complete</span>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</section>

<!--/.INTRO END-->
<section id="offer">
	<div class="container">
		<div class="row   alert alert-info">
			<div class="col-md-8 col-sm-8">
				<h1>Download Deatils Now For Latest Offers</h1>
			</div>
			<div class="col-md-4 col-sm-4" style="padding-top: 15px;">
				<a href="#" class=" btn btn-primary btn-lg">GRAB IT HERE NOW</a>
			</div>

		</div>
	</div>
</section>
<!--/.OFFFER END-->
<section id="just-intro">
	<div class="container">
		<div class="row text-center pad-row">
			<div class="col-md-4  col-sm-4">
				<i class="fa fa-desktop fa-5x"></i>
				<h4>
					<strong>Sure Quique Menu</strong>
				</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Lorem
					ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<a href="#" class="btn btn-primary">Read Details</a>
			</div>
			<div class="col-md-4  col-sm-4">
				<i class="fa fa-flask  fa-5x"></i>
				<h4>
					<strong>Sure Quique Menu</strong>
				</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Lorem
					ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<a href="#" class="btn btn-primary">Read Details</a>
			</div>
			<div class="col-md-4  col-sm-4">
				<i class="fa fa-pencil  fa-5x"></i>
				<h4>
					<strong>Sure Quique Menu</strong>
				</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Lorem
					ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<a href="#" class="btn btn-primary">Read Details</a>
			</div>

		</div>
	</div>
</section>
<!--/.JUST-INTRO END-->
<section class="note-sec">

	<div class="container">
		<div class="row text-center pad-row">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 ">
				<i class="fa fa-quote-left fa-3x"></i>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Lorem
					ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
					dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl
					odio. Mauris vehicula at nunc id posuere.</p>
			</div>
		</div>
	</div>

</section>
<!--/.NOTE END-->
<section id="clients">


	<div class="container">
		<div class="row text-center pad-bottom">
			<div class="col-md-12">
				<img src="assets/img/clients.png" alt="" class="img-responsive" />
			</div>

		</div>
	</div>
</section>
<!--/.CLIENTS END-->

