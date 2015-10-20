<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var \app\models\Post[] $posts */
/** @var \yii\data\Pagination $pagination */
$this->title = 'Demo blog for devgroup/yii2-multilingual';
?>

<?php foreach ($posts as $model): ?>
    <article id="post-<?=$model->id?>" class="blog-post">
        <div class="blog-post-title">
            <?= Html::a($model->title, ['/post/show', 'id'=>$model->id]) ?>
        </div>
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
            <?= $model->announce ?>

            <?= $this->render('_post-footer', ['model'=>$model,'renderReadMore'=>true]) ?>

        </div>
    </article>
<?php endforeach; ?>
