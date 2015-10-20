<?php

namespace app\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class BackendController extends Controller
{
    public $layout = 'admin';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (Yii::$app->user->isGuest===true) {
                                return false;
                            }
                            return Yii::$app->user->identity->id === '1';
                        }
                    ],
                ],
            ],
        ];
    }
}