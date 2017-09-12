<?php
namespace frontend\widgets\post;

use Yii;
use yii\base\Widget;
use common\models\PostsModel;
use frontend\models\PostForm;
use yii\helpers\Url;
use yii\data\Pagination;

class PostWidget extends Widget
{

    public $title = '';

    /*
     * 显示条数
     */
    public $limit = 6;

    /*
     * 是否显示更多
     */
    public $more = true;

    /*
     * 是否分页
     */
    public $page = true;

    public $cat_id = '';

    /*
     * 函数用途描述：
     * @date:2017年8月6日 上午11:43:33
     * @author: xiaoxie
     * @param:
     */
    public function run()
    {
        $curPage = Yii::$app->request->get('page', 1);
        // 查询条件 是否发布
        $cat_id = Yii::$app->request->get('id');
        if ($cat_id) {
            $cond = [
                'is_valid' => PostsModel::IS_VALID,
                'cat_id' => $cat_id
            ];
        } else {
            $cond = [
                '=',
                'is_valid',
                PostsModel::IS_VALID
            ];
        }
        $res = PostForm::getList($cond, $curPage, $this->limit);
        $result['title'] = $this->title ? $this->title : "最新文章";
        $result['more'] = Url::to([
            'post/index'
        ]);
        $result['body'] = $res['data'] ? $res['data'] : [];
        // 是否显示分页
        if ($this->page) {
            $pages = new Pagination([
                'totalCount' => $res['count'],
                'pageSize' => $res['pageSize']
            ]);
            $result['page'] = $pages;
        }
        
        return $this->render('index', [
            'data' => $result
        ]);
    }
}
?>