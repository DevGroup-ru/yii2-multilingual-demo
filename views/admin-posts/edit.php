<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use karpoff\icrop\CropImageUpload;

/** @var \yii\web\View $title */
$this->title = Yii::t('app', 'Post edit');
$this->params['breadcrumbs'][] = ['url' => ['/admin-posts/index'], 'label' => Yii::t('app', 'Posts')];

?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <?php $form = ActiveForm::begin(['id' => 'post-form', 'type' => ActiveForm::TYPE_HORIZONTAL, 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?=
                        $form->field($model, 'created_at')->widget(
                            DateTimePicker::className(),
                            [
                                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd hh:ii',
                                    'todayHighlight' => true
                                ],
                            ]
                        )
                        ?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if ($model->photo): ?>
                            <div class="form-group">
                                <div><b><?= Yii::t('app', 'Current photo') ?></b></div>
                                <?= Html::img($model->getImageUrl('photo', 'mini')) ?>
                            </div>
                        <?php endif; ?>
                        <?= $form->field($model, 'photo')->widget('maxmirazh33\image\Widget') ?>
                    </div>
                </div>



                <?=
                DevGroup\Multilingual\widgets\MultilingualFormTabs::widget([
                    'model' => $model,
                    'childView' => __DIR__ . DIRECTORY_SEPARATOR . '_edit-tab.php',
                    'form' => $form,
                ])
                ?>
            </div>
            <div class="box-footer">
                <?=
                Html::submitButton(
                    '<i class="fa fa-save"></i> ' . Yii::t('app', 'Save'),
                    [
                        'class' => 'btn btn-primary pull-right',
                        'name' => 'action',
                        'value' => 'back',
                    ]
                )?>
            </div>

            <?php
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>

