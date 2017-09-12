<?php
namespace frontend\widgets\hot;

use yii\base\Widget;
use yii\db\Query;
use common\models\PostExtendsModel;
use common\models\PostsModel;

class HotWidget extends Widget
{

    public $title = '';

    public $limit = 6;

    public function run()
    {
        $res = (new Query())->select('a.browser, b.id, b.title')
            ->from([
            'a' => PostExtendsModel::tableName()
        ])
            ->join('LEFT JOIN', [
            'b' => PostsModel::tableName()
        ], 'a.post_id = b.id')
            ->where('b.is_valid= ' . PostsModel::IS_VALID)
            ->orderBy([
            'browser' => SORT_DESC,
            'id' => SORT_DESC
        ])
            ->limit($this->limit)
            ->all();
        
        $result['title'] = $this->title ?: '热门浏览';
        $result['body'] = $res ?: [];
        return $this->render('index', [
            'data' => $result
        ]);
    }
}