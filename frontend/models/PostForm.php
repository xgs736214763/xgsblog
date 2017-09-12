<?php
namespace frontend\models;

/**
 * 文章模型表单控制器
 */
use Yii;
use yii\base\Model;
use common\models\PostsModel;
use common\models\RelationPostTagsModel;
use yii\db\Query;
use yii\web\NotFoundHttpException;

class PostForm extends Model
{

    public $id;

    public $title;

    public $content;

    public $label_img;

    public $cat_id;

    public $tags;

    public $_lastError = '';
 // 错误提示
    
    /*
     * 定义场景常量
     */
    const SCENARIOS_CREATE = 'create';

    const SCENARIOS_UPDATE = 'update';

    /**
     * 函数用途描述
     *
     * 定义事件 文章创建之后
     * @date: 2017年6月19日 下午10:44:39
     * 
     * @author : xiaoxie
     * @param
     *            : EVENT_AFTER_CREATE
     * @return :
     */
    const EVENT_AFTER_CREATE = "eventAfterCreate";

    const EVENT_AFTER_UPDATE = "eventAfterUpdate";

    /*
     * 场景设置
     *
     */
    public function scenarios()
    {
        $scenarios = [
            self::SCENARIOS_CREATE => [
                'title',
                'content',
                'label_img',
                'cat_id',
                'tags'
            ],
            self::SCENARIOS_UPDATE => [
                'title',
                'content',
                'label_img',
                'cat_id',
                'tags'
            ]
        ];
        return array_merge(parent::scenarios(), $scenarios);
    }

    public function rules()
    {
        return [
            [
                [
                    'id',
                    'title',
                    'content',
                    'cat_id'
                ],
                'required'
            ],
            [
                [
                    'id',
                    'cat_id'
                ],
                'integer'
            ],
            [
                'title',
                'string',
                'min' => 4,
                'max' => 50
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Title'),
            'content' => Yii::t('common', 'Content'),
            'label_img' => Yii::t('common', 'Label_img'),
            'tags' => Yii::t('common', 'Tags'),
            'cat_id' => Yii::t('common', 'Cat_id')
        ];
    }

    /* create方法 */
    public function create()
    {
        // 事务
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = new PostsModel();
            $model->setAttributes($this->attributes);
            $model->summary = $this->_getSummary();
            $model->user_id = Yii::$app->user->identity->id;
            $model->user_name = Yii::$app->user->identity->username;
            $model->is_valid = PostsModel::IS_VALID;
            $model->created_at = time();
            $model->updated_at = time();
            if (! $model->save()) {
                throw new \Exception('文章保存失败');
            } else {
                $this->id = $model->id;
            }
            
            // 调用事件
            $data = array_merge($this->getAttributes(), $model->getAttributes());
            $this->_eventAfterCreate($data);
            
            $transaction->commit();
            return true;
        } catch (\yii\base\Exception $e) {
            $transaction->rollBack();
            $this->_lastError = $e->getMessage();
            return false;
        }
    }

    /**
     * 函数用途描述
     * 获取文章摘要
     * @date: 2017年6月19日 上午12:14:39
     * 
     * @author : xiaoxie
     * @param
     *            : variable
     * @return :_getSummary
     */
    private function _getSummary($s = 0, $e = 90, $char = 'utf-8')
    {
        if (empty($this->content)) {
            return null;
        } else {
            return (mb_substr(str_replace('&nbsp;', '', strip_tags($this->content)), $s, $e, $char));
        }
    }

    /**
     * 函数用途描述
     * 文章创建之后调用事件
     * @date: 2017年6月19日 上午12:18:05
     * 
     * @author : xiaoxie
     * @param
     *            : variable
     * @return :
     */
    public function _eventAfterCreate($data)
    {
        // 添加事件
        $this->on(self::EVENT_AFTER_CREATE, [
            $this,
            '_eventAddTag'
        ], $data);
        // 触发事件
        $this->trigger(self::EVENT_AFTER_CREATE);
    }

    /**
     * 函数用途描述
     * 添加标签
     * @date: 2017年6月19日 下午10:54:32
     * 
     * @author : xiaoxie
     * @param
     *            : _eventAddTag
     * @return :
     */
    public function _eventAddTag($event)
    {
        // 保存标签
        $tags = new TagForm();
        $tags->tags = $event->data['tags'];
        $tagids = $tags->saveTags();
        
        // 删除原先的关联关系
        RelationPostTagsModel::deleteAll([
            'post_id' => $event->data['id']
        ]);
        
        // 批量保存文章和标签的关系
        
        if (! empty($tagids)) {
            foreach ($tagids as $k => $id) {
                $row[$k]['post_id'] = $this->id;
                $row[$k]['tag_id'] = $id;
            }
        }
        
        // 批量插入
        $res = (new Query())->createCommand()
            ->batchInsert(RelationPostTagsModel::tableName(), [
            'post_id',
            'tag_id'
        ], $row)
            ->execute();
        
        if (! $res) {
            throw new \Exception('关联关系保存失败');
        }
    }

    /*
     * 通过id获取文章
     */
    public function getViewById($id)
    {
        $res = PostsModel::find()->where([
            'id' => $id
        ])
            ->with('relate.tag', 'extend')
            ->asArray()
            ->one();
        // print_r($res);exit;
        if (! $res) {
            throw new NotFoundHttpException('文章不存在');
        }
        if (isset($res['relate']) && ! empty($res['relate'])) {
            foreach ($res['relate'] as $list) {
                $res['tags'][] = $list['tag']['tag_name'];
            }
            unset($res['relate']);
        }
        return $res;
    }

    /**
     * 通过文章id获取文章和标签
     */
    public function getViews($id)
    {
        $res = PostsModel::find()->where([
            'id' => $id
        ])
            ->with('relate.tag')
            ->asArray()
            ->one();
        if (! $res) {
            throw new NotFoundHttpException('文章不存在');
        }
        if (isset($res['relate']) && ! empty($res['relate'])) {
            foreach ($res['relate'] as $list) {
                $res['tags'][] = $list['tag']['tag_name'];
            }
            unset($res['relate']);
        }
        return $res;
    }

    /*
     * 函数用途描述：获取文章列表数据
     * @date:2017年8月6日 下午3:33:25
     * @author: xiaoxie
     * @param:
     */
    public static function getList($cond, $curPage = 1, $pageSize = 5, $orderBy = ['id'=>SORT_DESC])
    {
        $model = new PostsModel();
        // 查询语句
        $select = [
            'id',
            'title',
            'summary',
            'label_img',
            'cat_id',
            'user_id',
            'user_name',
            'is_valid',
            'created_at',
            'updated_at'
        ];
        $query = $model->find()
            ->select($select)
            ->where($cond)
            ->with('relate.tag', 'extend')
            ->orderBy($orderBy);
        // 获取分页数据
        $res = $model->getPages($query, $curPage, $pageSize);
        // 格式化数据
        $res['data'] = self::_formatList($res['data']);
        return $res;
    }

    /*
     * 函数用途描述：数据格式和
     * @date:2017年8月6日 下午3:45:27
     * @author: xiaoxie
     * @param:
     */
    public static function _formatList($data)
    {
        foreach ($data as &$list) {
            $list['tags'] = [];
            if (isset($list['relate']) && ! empty($list['relate'])) {
                foreach ($list['relate'] as $lt) {
                    $list['tags'][] = $lt['tag']['tag_name'];
                }
            }
            unset($list['relate']);
        }
        return $data;
    }
}

