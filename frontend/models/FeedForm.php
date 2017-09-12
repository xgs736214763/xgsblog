<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\FeedsModel;

/**
 *
 * @author xiaoxie
 *        
 */
class FeedForm extends Model
{

    public $content;

    public $_lastError;

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '內容'
        ];
    }

    public function rules()
    {
        return [
            [
                'content',
                'required'
            ],
            [
                'content',
                'string',
                'max' => 255
            ]
        ];
    }

    public function getList()
    {
        $model = new FeedsModel();
        $res = $model->find()
            ->with('user')
            ->limit(10)
            ->orderBy([
            'id' => SORT_DESC
        ])
            ->asArray()
            ->all();
        return $res ?: [];
    }

    /**
     * 保存
     */
    public function create()
    {
        try {
            $model = new FeedsModel();
            $model->user_id = Yii::$app->user->identity->id;
            $model->content = $this->content;
            $model->created_at = time();
            if (! $model->save())
                throw new \Exception('保存失败！');
            
            return true;
        } catch (\Exception $e) {
            $this->_lastError = $e->getMessage();
            return false;
        }
    }
}

