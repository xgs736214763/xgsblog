<?php
use yii\helpers\Url;
?>
<?php if(!empty($data)):?>

<div class="panel">
	<div class="panel-title box-title">
		<span><strong><?=$data['title']?></strong></span>
	</div>
	<div class="panel-body hot-body">
        <?php foreach ($data['body'] as $list):?>
        <div class="clearfix hot-list"
			style='background-color: azure; line-height: 29px; padding-top: 6px;'>

			<div class="col-lg-6" style='padding-left: 16%; font-size: 16px;'>
				<a href="<?=Url::to(['post/index','id'=>$list['id']])?>"><?=$list['cat_name']?></a>
			</div>
		</div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>