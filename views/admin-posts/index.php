<?php


/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var \app\models\Page $searchModel
 */

use kartik\dynagrid\DynaGrid;

$this->title = Yii::t('app', 'Posts');

$this->params['breadcrumbs'][] = $this->title;

?>

<?= \dmstr\widgets\Alert::widget([
    'id' => 'alert',
]); ?>


<?php $this->beginBlock('buttonGroup'); ?>
<div class="btn-toolbar" role="toolbar">
    <div class="btn-group">
        <?=
        \yii\helpers\Html::a(
            '<i class="fa fa-plus"></i> ' . Yii::t('app', 'Add'),
            ['/admin-posts/edit'],
            ['class' => 'btn btn-success']
        )
        ?>
    </div>

</div>
<?php $this->endBlock(); ?>

<?=
DynaGrid::widget([
    'options' => [
        'id' => 'post-grid',
    ],
    'columns' => [
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'id',
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'title',
        ],

        'created_at',
        [
            'class' => \app\components\ActionColumn::className(),
        ]

    ],
    'theme' => 'panel-default',
    'gridOptions'=>[
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover'=>true,

        'panel'=>[
            'heading'=>'<h3 class="panel-title">'.$this->title.'</h3>',
            'after' => $this->blocks['buttonGroup'],
        ],

    ]
]);
?>
