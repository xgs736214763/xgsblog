<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "post_extends".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $browser
 * @property integer $collect
 * @property integer $praise
 * @property integer $comment
 */
class PostExtendsModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_extends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'browser', 'collect', 'praise', 'comment'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'post_id' => Yii::t('common', 'Post ID'),
            'browser' => Yii::t('common', 'Browser'),
            'collect' => Yii::t('common', 'Collect'),
            'praise' => Yii::t('common', 'Praise'),
            'comment' => Yii::t('common', 'Comment'),
        ];
    }
    /*
    *函数用途描述 :更新操作
    *@date:2017年8月5日 下午11:44:37
    *@author: xiaoxie
    *@$cond:条件
    *@$attibute:要更新的字段
    *@$num:次数
    */
    public function upCounter($cond,$attibute,$num)
    {
        $counter = $this->findOne($cond);
        if (!$counter){
            $this->setAttributes($cond);
            $this->$attibute = $num;
            $this->save();
        }else{
            $countData[$attibute] = $num;
            $counter->updateCounters($countData);
        }
    }
}
