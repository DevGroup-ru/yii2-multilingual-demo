<?php

namespace app\controllers;

use app\models\NewsletterSubscribers;
use app\models\SubscribeForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

class NewsletterController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new NewsletterSubscribers();
        $model->language_id = Yii::$app->multilingual->language_id;
        $model->subscribed_at = date("Y-m-d H:i:s");

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['status' => $model->save()];
            }
        }
        throw new BadRequestHttpException();
    }

    public function actionTest()
    {
        return $this->renderContent(Yii::$app->multilingual->cookie_language_id);
    }
}
