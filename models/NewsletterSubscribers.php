<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%newsletter_subscribers}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $subscribed_at
 * @property integer $language_id
 */
class NewsletterSubscribers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newsletter_subscribers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'language_id'], 'required'],
            [['subscribed_at'], 'safe'],
            [['language_id'], 'integer'],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'subscribed_at' => Yii::t('app', 'Subscribed At'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }
}
