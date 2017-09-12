<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property integer $created_at
 */
class FeedsModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'content', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_id' => Yii::t('common', 'User ID'),
            'content' => Yii::t('common', 'Content'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id'=>'user_id']);
    }
    
    
    
    
    
}
