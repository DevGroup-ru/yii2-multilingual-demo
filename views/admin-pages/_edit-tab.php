<?php
/** @var \yii\web\View $this */
/** @var integer $language_id */
/** @var \DevGroup\Multilingual\models\Language $language */
/** @var \app\models\PageTranslation $model */
/** @var string $attributePrefix */
/** @var \yii\widgets\ActiveForm $form */
use yii\helpers\Url;

?>
<?= $form->field($model, $attributePrefix.'title') ?>
<?=
$form->field($model, $attributePrefix.'is_published')
    ->widget(kartik\widgets\SwitchInput::className())
?>
<?=
$form->field($model, $attributePrefix.'content')
    ->widget(
        \vova07\imperavi\Widget::className(),
        [
            'settings' => [
                'minHeight' => 200,
                'plugins' => [
                    'table',
                    'fontsize',
                    'fontfamily',
                    'fontcolor',
                    'video',
                    'imagemanager',
                    'clips',
                    'fullscreen',
                    'filemanager',
                ],
                'pastePlainText' => true,
                'buttonSource' => true,
                'replaceStyles' => [],
                'replaceTags' => [],
                'deniedTags' => [],
                'removeEmpty' => [],

                'imageUpload' => Url::to(['/admin/image-upload']),
                'imageManagerJson' => Url::to(['/admin/images-get']),
                'fileUpload' => Url::to(['/admin/file-upload']),
                'fileManagerJson' => Url::to(['/admin/files-get']),
            ],
        ]
    )
?>

<!-- ok -->
