<?php
use yii\helpers\Url;
?>
<div id="carousel-example-generic" class="carousel slide"
	data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
  <?php foreach ($data['items'] as $k=>$v):?>
  
    <li data-target="#carousel-example-generic" data-slide-to="<?=$k ?>"
			class="<?= isset($v['active'])?$v['active']:'' ?>"></li>
    <?php endforeach;?>
  </ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
    <?php foreach ($data['items'] as $k=>$v):?>
   
    <div class="item <?= isset($v['active'])?$v['active']:'' ?>">
			<a href="<?= Url::to($v['url'])?>"> <img src="<?=$v['image_url']?>"
				alt="<?=$v['label']?>">
				<div class="carousel-caption">
        <?=$v['html']?>
      </div>
			</a>
		</div>
    
    <?php endforeach;?>
   
  </div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic"
		role="button" data-slide="prev"> <span
		class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span
		class="sr-only">Previous</span>
	</a> <a class="right carousel-control" href="#carousel-example-generic"
		role="button" data-slide="next"> <span
		class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span
		class="sr-only">Next</span>
	</a>
</div>