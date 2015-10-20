<?php

namespace app\components;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class ActionColumn modifies default functionality of yii2tech\admin\grid\ActionColumn
 * @package app\components
 */
class ActionColumn extends \yii2tech\admin\grid\ActionColumn
{
    /** @inheritdoc */
    public $template = '{view} {edit} {delete}';

    /** @inheritdoc */
    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();
        $this->buttons['edit'] = $this->buttons['update'];
        unset($this->buttons['update']);
        $this->buttons['view']['options'] = [
            'target' => '_blank',
        ];
        array_walk(
            $this->buttons,
            function (&$item) {
                $item['options'] = ArrayHelper::merge($item['options'], [
                    'class' => 'btn btn-default btn-sm',
                ]);
            }
        );
    }
}
