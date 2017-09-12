<?php
/**
* 文件用途描述
* 关联关系表
* @date: 2017年6月19日 下午11:16:14
* @author: xiaoxie
*/
namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "relation_post_tags".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $tag_id
 */
class RelationPostTagsModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation_post_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'integer'],
            [['post_id', 'tag_id'], 'unique', 'targetAttribute' => ['post_id', 'tag_id'], 'message' => 'The combination of Post ID and Tag ID has already been taken.'],
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
            'tag_id' => Yii::t('common', 'Tag ID'),
        ];
    }
    /*
     * 关联tag表
     */
   
    public function getTag()
    {
        return $this->hasOne(TagsModel::className(), ['id'=>'tag_id']);
    }
}
