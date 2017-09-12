<?php
namespace frontend\models;

/**
 * 文件用途描述
 * 标签表单模型
 * @date: 2017年6月19日 下午10:59:39
 * 
 * @author : xiaoxie
 *        
 */
use yii\base\Model;
use common\models\TagsModel;

class TagForm extends Model
{

    public $id;

    public $tags;

    public function rules()
    {
        return [
            [
                'tags',
                'required'
            ],
            [
                'tags',
                'each',
                'rule' => [
                    'string'
                ]
            ]
        ];
    }

    /*
     * 保存标签
     */
    public function saveTags()
    {
        $ids = [];
        if (! empty($this->tags)) {
            foreach ($this->tags as $tag) {
                $ids[] = $this->_saveTag($tag);
            }
        }
        return $ids;
    }

    /*
     * 单个标签保存
     */
    private function _saveTag($tag)
    {
        $model = new TagsModel();
        $res = $model->find()
            ->where([
            'tag_name' => $tag
        ])
            ->one();
        if (! $res) { // 添加标签
            $model->tag_name = $tag;
            $model->post_num = 1;
            if (! $model->save()) {
                // 保存失败
                throw new \Exception('保存标签失败');
            }
            return $model->id;
        } else {
            // 更新post_num
            $res->updateCounters([
                'post_num' => 1
            ]);
        }
        return $res->id;
    }
}

