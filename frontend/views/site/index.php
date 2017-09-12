<?php
use frontend\widgets\banner\BannerWidget;
use yii\base\Widget;
use frontend\widgets\post\PostWidget;
use frontend\widgets\chat\ChatWidget;
use frontend\widgets\hot\HotWidget;
use yii\helpers\Url;
use frontend\widgets\tag\TagWidget;
use frontend\widgets\weather\WeatherWidget;

/* @var $this yii\web\View */

$this->title = '博客-首页';
?>


<div class="row">

	<div class="row">
		<div class="col-lg-8">
			<?=BannerWidget::widget() ?>
		</div>
		<div class="col-lg-4" style='padding-left: 2%;'>
			<!-- 只言片语 -->
			<?php /**ChatWidget::widget()**/ ?>
			<?=WeatherWidget::widget() ?>
		</div>
	</div>

	<div class="panel"></div>

	<div class="row">
		<div class="col-lg-8">
			<?=PostWidget::widget(['limit'=>3,'page'=>false]);?>
		</div>
		<div class="col-lg-4">
			<?php if(!\Yii::$app->user->isGuest):?>
        		<a href="<?=Url::to('/post/create') ?>"
				class="btn btn-success btn-block btn-post">添加文章</a> 
        		
        	<?php endif;?>
        	<div class="panel"></div>
			<!-- 热门浏览 -->
        		<?=HotWidget::widget(); ?>
        	 <!-- 标签云 -->
			<?=TagWidget::widget() ?>
		</div>
	</div>

</div>

