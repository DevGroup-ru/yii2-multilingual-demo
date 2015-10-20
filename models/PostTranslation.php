<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%post_translation}}".
 *
 * @property integer $model_id
 * @property integer $language_id
 * @property string $title
 * @property string $announce
 * @property string $content
 * @property integer $is_active
 * @property double $longitude
 * @property double $latitude
 * @property integer $is_coordinates_set
 */
class PostTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'required'],
            [['model_id', 'language_id'], 'integer'],
            [['announce', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['title', 'announce', 'content'], 'default', 'value' => ''],
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
            'announce' => Yii::t('app', 'Announce'),
            'content' => Yii::t('app', 'Content'),
            'is_published' => Yii::t('app', 'Is Active'),

        ];
    }
}
