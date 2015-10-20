<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var \app\models\Page $model */
$this->title = $model->title;
?>
<div class="container">
    <div id="main">
        <article id="post-<?=$model->id?>" class="post format-standard hentry sticky">
            <div class="post-header">
                <h1>
                    <?= Html::encode($model->title) ?>
                </h1>
            </div>
            <div class="post-entry">
                <?= $model->content ?>

                <?= $this->render('_post-footer', ['model'=>$model,'renderReadMore'=>false]) ?>

            </div>

        </article>
    </div>
</div>
