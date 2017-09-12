<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostsModel extends BaseModel
{
    const IS_VALID = 1; //已发布
    const NO_VALID = 0; //未发布
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Title'),
            'summary' => Yii::t('common', 'Summary'),
            'content' => Yii::t('common', 'Content'),
            'label_img' => Yii::t('common', 'Label_img'),
            'cat_id' => Yii::t('common', 'Cat_iD'),
            'user_id' => Yii::t('common', 'User_iD'),
            'user_name' => Yii::t('common', 'User_name'),
            'is_valid' => Yii::t('common', 'Is_Valid'),
            'created_at' => Yii::t('common', 'Created_at'),
            'updated_at' => Yii::t('common', 'Updated_at'),
        ];
    }
    //关联relation_post_tag表
    public function getRelate()
    {
       return $this->hasMany(RelationPostTagsModel::className(), ['post_id'=>'id']);
    }
    /*
    *函数用途描述：关联post_extend
    *@date:2017年8月5日 下午11:52:07
    *@author: xiaoxie
    *@param:
    */
    public function getExtend() {
       return $this->hasOne(PostExtendsModel::className(), ['post_id'=>'id']);
    }
}
