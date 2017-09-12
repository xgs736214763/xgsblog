<?php
use frontend\widgets\hot\HotWidget;
use yii\base\Widget;
use yii\helpers\Url;

$this->title = $data['title'];
$this->params['breadcrumbs'][] = [
    'label' => '文章',
    'url' => [
        'post/index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-lg-9">
		<div class="page-title">
			<h1><?=$data['title']?></h1>
			<span>作者:<?=$data['user_name'] ?></span> <span>发布:<?=date('Y-m-d',$data['created_at']) ?></span>
			<span>浏览:<?= isset($data['extend']['browser'])?$data['extend']['browser']:0;?>次</span>
		</div>
		<div class='page-content'>
    		<?=$data['content']?>
    	</div>

		<div class='page-tag'>
        	标签:
        <?php if(!empty($data['tags'])):?>
        <?php foreach ($data['tags'] as $tag): ?>
        	<span><a href="#"><?=$tag?></a></span>
        <?php endforeach;?>
        <?php endif;?>	
        </div>
	</div>

	<div class="col-lg-3">
    	<?php if(!\Yii::$app->user->isGuest):?>
    		<a href="<?=Url::to('/post/create') ?>"
			class="btn btn-success btn-block btn-post">添加文章</a> 
    		
    	<?php endif;?>
    	
    	<?php if(\Yii::$app->user->id ==$data['user_id']):?>
    		<a
			href="<?=Url::to(['/post/update','id'=>Yii::$app->request->get('id')]) ?>"
			class="btn btn-info btn-block btn-post">编辑文章</a> 
    	<?php endif;?>
    	<?=HotWidget::widget() ?>
    </div>

</div>