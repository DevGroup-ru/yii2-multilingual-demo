<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%page_translation}}".
 *
 * @property integer $model_id
 * @property integer $language_id
 * @property string $title
 * @property string $content
 * @property integer $is_active
 */
class PageTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'required'],
            [['model_id', 'language_id'], 'integer'],
            [['content'], 'string'],
            [['title'], 'safe'],
            [['title', 'content'], 'default', 'value' => ''],
            [['is_published'], 'filter', 'filter'=>'boolval',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model_id' => Yii::t('app', 'Model ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'is_published' => Yii::t('app', 'Is Active'),
        ];
    }
}
