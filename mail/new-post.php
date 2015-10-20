<?php

use yii\helpers\Html;

/** @var \app\models\Post $post */
/** @var integer $language_id */
?>
<h1>
    <?= Yii::t('app', 'Hi! There\'s new post on yii2-multilingual-demo') ?>
</h1>

<h2>
    <?= Html::encode($post->translate($language_id)->title) ?>
</h2>

<div class="post-content">
    <?= $post->translate($language_id)->announce ?>
</div>
<a href="<?= \yii\helpers\Url::to(['post/show', 'id' => $post->id, 'language_id' => $language_id], true) ?>" class="read-more">
    <?= Yii::t('app', 'Read more') ?>
</a>