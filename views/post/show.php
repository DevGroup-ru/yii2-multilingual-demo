<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var \app\models\Post $model */
$this->title = $model->title;
?>

<article id="post-<?=$model->id?>" class="blog-post">
    <h2 class="blog-post-title">
        <?= Html::encode($model->title) ?>
    </h2>
    <div class="blog-post-meta">
        <?= date("M d, Y", strtotime($model->created_at)) ?>
    </div>
    <?php if ($model->photo):?>
    <div class="blog-post-image">
        <a href="<?= Url::to(['/post/show', 'id'=>$model->id]) ?>" class="popup">
            <img src="<?= $model->getImageUrl('photo') ?>" alt="<?= Html::encode($model->title) ?>">
        </a>

    </div>
    <?php endif;?>

    <div class="blog-post-body">
        <?= $model->content ?>

        <?= $this->render('_post-footer', ['model'=>$model,'renderReadMore'=>false]) ?>

    </div>
    <div class="blog-post-comments" id="comments">
        <h3 class="post-box-title">
            <?= Yii::t('app', 'Comments') ?>
        </h3>
        <div class="comments">
            <?=
            dosamigos\disqus\Comments::widget([
                'shortname' => 'yii2-multilingual-demo',
                'identifier' => "post-{$model->id}",
            ]) ?>
        </div>
    </div>
</article>
