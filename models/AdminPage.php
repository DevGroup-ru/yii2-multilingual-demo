<?php

namespace app\models;

use DevGroup\TagDependencyHelper\NamingHelper;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * Class AdminPage
 * @package app\models
 * @mixin \DevGroup\Multilingual\behaviors\MultilingualActiveRecord
 */
class AdminPage extends Page
{

    /**
     * Override Page find method to include unpublished records
     * @return object
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        /** @var ActiveQuery $query */
        return Yii::createObject(ActiveQuery::className(), [get_called_class()]);
    }

    /**
     * Override safe attributes to include translation attributes
     * @return array
     */
    public function safeAttributes()
    {
        $t = new PageTranslation();
        return ArrayHelper::merge(parent::safeAttributes(), $t->safeAttributes());
    }

    /**
     * Override for filtering in grid
     * @param string $attribute
     *
     * @return bool
     */
    public function isAttributeActive($attribute)
    {
        return in_array($attribute, $this->safeAttributes());
    }

    /**
     * Returns ActiveDataProvider for admin grid of posts
     * @param array $params
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        /* @var $query \yii\db\ActiveQuery */
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query = static::find(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]
        );
        if (!($this->load($params))) {
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id]);

        $translation = new PageTranslation();
        if (!$translation->load($params)) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'defaultTranslation.title', $this->title]);
        return $dataProvider;
    }

    /**
     * Invalidate model tags.
     * @return bool
     */
    public function invalidateTags()
    {
        /** @var \DevGroup\TagDependencyHelper\TagDependencyTrait $this */
        \yii\caching\TagDependency::invalidate(
            $this->getTagDependencyCacheComponent(),
            [
                self::commonTag(),
                Page::commonTag(),
                $this->objectTag(),
                NamingHelper::getObjectTag(Page::className(), $this->getPrimaryKey()),
            ]
        );
        return true;
    }
}
