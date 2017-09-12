<?php
namespace frontend\widgets\category;

use yii\base\Widget;
use common\models\CatModel;

/**
 *
 * @author xiaoxie
 *        
 */
class CategoryWidget extends Widget
{

    public function run()
    {
        $data = [];
        
        $list = CatModel::find()->asArray()->all();
        $data['title'] = '文章分类';
        $data['body'] = $list;
        return $this->render('index', [
            'data' => $data
        ]);
    }
}

