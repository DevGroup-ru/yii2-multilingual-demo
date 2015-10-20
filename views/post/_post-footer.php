<?php
/** @var \yii\web\View $this */
/** @var \app\models\Post $model */
/** @var boolean $renderReadMore */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="blog-post-footer row">
    <div class="col-sm-3">

        <span class="entry-comments">
            <a href="<?= Url::to(['/post/show', 'id' => $model->id]) ?>">
                <i class="fa fa-comment"></i>
            </a>
            <a href="<?= Url::to(['/post/show', 'id' => $model->id], true) ?>#disqus_thread" class="disqus-comment-count" data-disqus-identifier="post-<?=$model->id?>">
                <?= Yii::t('app', 'View comments') ?>
            </a>
        </span>

    </div>
    <div class="col-sm-6">
        <div class="post-share">
            <?= Yii::t('app', 'Share:') ?>
            <div class="social-likes" data-url="<?= Html::encode(Url::to(['/post/show', 'id'=>$model->id], true))?>" data-title="<?= Html::encode($model->title)?>">
                <div class="facebook" title="<?= Yii::t('app', 'Share with Facebook') ?>">

                </div>
                <div class="twitter" title="<?= Yii::t('app', 'Share with Twitter') ?>">

                </div>
                <div class="vkontakte" title="<?= Yii::t('app', 'Share with VK') ?>">

                </div>
                <div class="odnoklassniki" title="<?= Yii::t('app', 'Share with OK.ru') ?>">

                </div>
                <div class="plusone" title="<?= Yii::t('app', 'Share with Google+') ?>">

                </div>
                <?php if ($model->photo):?>
                    <div class="pinterest" title="<?= Yii::t('app', 'Share with Pinterest') ?>" data-media="<?= $model->getImageUrl('photo')?>">

                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php if ($renderReadMore):?>
    <div class="col-sm-3">

        <a href="<?= Url::to(['/post/show', 'id'=>$model->id])?>" class="read-more">
            <?= Yii::t('app', 'Read more') ?> <i class="fa fa-arrow-right"></i>
        </a>

    </div>
    <?php endif;?>
</div>