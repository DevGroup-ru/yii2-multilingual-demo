<?php

namespace app\models;

use app\components\ImageBehavior;
use DevGroup\Multilingual\behaviors\MultilingualActiveRecord;
use DevGroup\Multilingual\traits\MultilingualTrait;
use DevGroup\TagDependencyHelper\TagDependencyTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @mixin \DevGroup\Multilingual\behaviors\MultilingualActiveRecord
 * @mixin \DevGroup\TagDependencyHelper\TagDependencyTrait
 * @mixin \DevGroup\Multilingual\traits\MultilingualTrait
 */
class Post extends \yii\db\ActiveRecord
{
    use MultilingualTrait;
    use TagDependencyTrait;
    use \maxmirazh33\image\GetImageUrlTrait;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualActiveRecord::className(),
                'translationModelClass' => PostTranslation::className(),
            ],
            'CacheableActiveRecord' => [
                'class' => \DevGroup\TagDependencyHelper\CacheableActiveRecord::className(),
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
//            'cropPhoto' => [
//                'class' => CropImageUploadBehavior::className(),
//                'attribute' => 'photo',
//                'path' => '@webroot/images/',
//                'url' => '@web/images/',
//                'ratio' => 1.5,
//                'crop_field' => 'photo_crop',
//                'cropped_field' => 'photo_cropped',
//            ],
            [
                'class' => ImageBehavior::className(),
                'savePathAlias' => '@app/web/images/',
                'urlPrefix' => '/images/',
                'crop' => true,
                'attributes' => [
                    'photo' => [
                        'savePathAlias' => '@app/web/images/',
                        'urlPrefix' => '/images/',
                        'width' => 1040,
                        'height' => 700,
                        'thumbnails' => [
                            'mini' => [
                                'width' => 120,
                                'height' => 120,
                            ]
                        ]
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['updated_at'],'default', 'value'=>date('Y-m-d H:i:s')],
            ['id', 'integer'],
            ['photo', 'file', 'extensions' => 'jpeg,jpg,gif,png', 'on' => ['insert', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'photo' => Yii::t('app', 'Photo'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
