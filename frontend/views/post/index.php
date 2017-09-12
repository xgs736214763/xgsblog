<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/6/17
 * Time: 23:46
 */
use frontend\widgets\post\PostWidget;
use yii\base\Widget;
use frontend\widgets\category\CategoryWidget?>


<div class='row'>
	<div class='col-lg-3'>
		<?=CategoryWidget::widget() ?>
	</div>
	<div class='col-lg-9'>
		<?=PostWidget::widget(['cat_id'=>2,'limit'=>5,'page'=>true]); ?>
	</div>

</div>
