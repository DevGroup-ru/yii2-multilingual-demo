<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/** @var \yii\web\View $title */
$this->title = Yii::t('app', 'Page edit');
$this->params['breadcrumbs'][] = ['url' => ['/admin-pages/index'], 'label' => Yii::t('app', 'Pages')];

?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
<?php $form = ActiveForm::begin(['id' => 'page-form', 'type' => ActiveForm::TYPE_HORIZONTAL]); ?>
<div class="box-body">
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

