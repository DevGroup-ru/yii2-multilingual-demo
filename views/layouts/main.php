<?php

/* @var $this \yii\web\View */
/* @var $content string */

use DevGroup\Multilingual\widgets\CityConfirmation;
use DevGroup\Multilingual\widgets\LanguageConfirmation;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
\rmrevin\yii\fontawesome\AssetBundle::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <?php $this->head() ?>

    <!-- here comes hreflang tag output with alternative languages for this page -->
    <?= \DevGroup\Multilingual\widgets\HrefLang::widget() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="blog-masthead">
    <div class="container">
        <div class="pull-right">
            <div class="pull-left lang-label">Language:</div>
            <?=
            DevGroup\Multilingual\widgets\LanguageSelector::widget([
                'blockClass' => 'b-language-selector dropdown pull-left'
            ])
            ?>
        </div>
        <?=
        \yii\widgets\Menu::widget([
            'items' => [
                [
                    'label' => Yii::t('app', 'Home'),
                    'url' => ['/post/index'],
                ],
                [
                    'label' => Yii::t('app', 'Multilingual post'),
                    'url' => ['/post/show', 'id' => 1,],
                ],
                [
                    'label' => Yii::t('app', 'RU only post'),
                    'url' => ['/post/show', 'id' => 2,],
                ],
                [
                    'label' => Yii::t('app', 'EN only post'),
                    'url' => ['/post/show', 'id' => 3,],
                ],
                [
                    'label' => Yii::t('app', 'Login'),
                    'url' => ['site/login'],
                    'visible' => Yii::$app->user->isGuest,
                ],
                [
                    'label' => Yii::t('app', 'Admin panel'),
                    'url' => ['admin/index'],
                    'visible' => !Yii::$app->user->isGuest,
                ],
                [
                    'label' => 'GitHub',
                    'url' => 'https://github.com/DevGroup-ru/yii2-multilingual',
                ],
            ],
            'options' => [
                'id' => 'menu-top-menu',
                'class' => 'blog-nav',
                'tag' => 'nav',
            ],
            'encodeLabels' => false,
            'itemOptions' => [
                'tag' => 'span',
                'class' => 'blog-nav-item',
            ],

        ])
        ?>


    </div>
</div>
<div class="container">
    <div class="blog-header">
        <div class="blog-title h1">
            <?= Yii::t('app', 'Demo blog for yii2-multilingual') ?>
        </div>
        <p class="lead blog-description">
            <?= Yii::t('app', 'This is an example application showing main package features.') ?>
        </p>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?= $content ?>
        </div>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>
                    <i class="fa fa-question-circle"></i>
                    <?= Yii::t('app', 'Hint') ?>
                </h4>
                <p>
                    <?= Yii::t('app', 'You can switch languages in top menu') ?>
                </p>
            </div>
            <div class="sidebar-module">
                <h4 class="widget-title">
                    <?= Yii::t('app', 'Newsletter') ?>
                </h4>
                <div class="newsletter-form">
                    <?php
                    $form = \yii\widgets\ActiveForm::begin();
                    $model = new \app\models\NewsletterSubscribers();
                    ?>
                    <p>
                        <label><?= Yii::t('app', 'Get the <i>latest news</i> and <i>updates</i> from the website') ?></label>
                        <?=
                        $form
                            ->field($model, 'email', ['inputOptions' => [
                                'class'=>'form-input email','type'=>'email','placeholder'=>'mail@example.com'
                            ]])
                            ->label(false)
                        ?>

                    </p>
                    <p>
                        <input type="submit" value="<?= Yii::t('app', 'Subscribe') ?>" class="btn btn-primary submit">
                    </p>
                    <p>
                        <?= Yii::t('app', 'Actually, this block shows:') ?>
                        <ul class="list-no-padding">
                            <li>
                                <?= Yii::t('app', 'How excludeRoutes param works and how to determine users language without URL info') ?>
                            </li>
                            <li>
                                <?= Yii::t('app', 'How to add tasks to yii2-deferred-tasks') ?>
                            </li>
                            <li>
                                <?= Yii::t('app', 'How console command will send letter in users language') ?>
                            </li>
                        </ul>
                    </p>
                    <?php
                    \yii\widgets\ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="blog-footer">
    <div class="container">
        <p class="pull-left">&copy; <a href="http://devgroup.ru/?utm_source=opensource&utm_medium=demo-app&utm_term=footer-link&utm_campaign=yii2-multilingual" target="_blank">DevGroup.ru</a> &amp; contributors <?= date('Y') ?></p>

<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
    </div>
</footer>
<?= dosamigos\disqus\CommentsCount::widget([
    'shortname' => 'yii2-multilingual-demo',
])?>
<?= LanguageConfirmation::widget(); ?>
<?= CityConfirmation::widget(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
