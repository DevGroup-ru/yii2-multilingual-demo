<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%images_translation}}".
 *
 * @property integer $model_id
 * @property integer $language_id
 * @property string $description
 */
class ImagesTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%images_translation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'required'],
            [['model_id', 'language_id'], 'integer'],
            [['description'], 'string'],
            ['description', 'default', 'value'=>''],
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
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
