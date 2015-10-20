<?php

namespace app\controllers;

use app\models\Page;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * Action that displays pages list
     * @return string
     */
    public function actionIndex()
    {
        $pages = Page::find()->orderBy(['created_at' => SORT_DESC]);

        $count = Yii::$app->cache->lazy(function () use ($pages) {
            return $pages->count();
        }, 'PagesCount', 86400, Page::commonTag());

        $pagination = new Pagination(['totalCount' => $count]);

        $pages = Yii::$app->cache->lazy(function () use ($pages, $pagination) {
            return $pages
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        }, "Pages:{$pagination->offset}:{$pagination->limit}", 86400, Page::commonTag());

        return $this->render(
            'index',
            [
                'pages' => $pages,
                'pagination' => $pagination,
            ]
        );
    }

    /**
     * Shows page by it's ID
     *
     * @param $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionShow($id)
    {
        $page = Page::loadModel(
            $id,
            false,
            false
        );
        if ($page === null) {
            throw new NotFoundHttpException;
        }

        return $this->render(
            'show',
            [
                'model' => $page,
            ]
        );
    }
}
