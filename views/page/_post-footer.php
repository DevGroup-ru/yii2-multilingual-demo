<?php
/** @var \yii\web\View $this */
/** @var \app\models\Post $model */
/** @var boolean $renderReadMore */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="post-footer">
    <div class="post-footer-col">
        <div class="post-share">
            <?= Yii::t('app', 'Share:') ?>
            <div class="social-likes" data-url="<?= Html::encode(Url::to(['/page/show', 'id'=>$model->id], true))?>" data-title="<?= Html::encode($model->title)?>">
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
            </div>
        </div>
    </div>
</div>