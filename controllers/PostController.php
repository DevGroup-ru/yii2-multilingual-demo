<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Action that displays posts list
     * @return string
     */
    public function actionIndex()
    {
        $languageId = Yii::$app->multilingual->language_id;

        $posts = Post::find()->orderBy(['created_at' => SORT_DESC]);

        $count = Yii::$app->cache->lazy(function () use ($posts) {
            return $posts->count();
        }, "PostsCount:$languageId", 86400, Post::commonTag());

        $pagination = new Pagination(['totalCount' => $count]);

        $posts = Yii::$app->cache->lazy(function () use ($posts, $pagination) {
            return $posts
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        }, "Posts:{$pagination->offset}:{$pagination->limit}:$languageId", 86400, Post::commonTag());

        return $this->render(
            'index',
            [
                'posts' => $posts,
                'pagination' => $pagination,
            ]
        );
    }

    /**
     * Shows post by it's ID
     *
     * @param $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionShow($id)
    {
        $post = Post::loadModel(
            $id,
            false,
            false
        );
        if ($post === null) {
            throw new NotFoundHttpException;
        }

        return $this->render(
            'show',
            [
                'model' => $post,
            ]
        );
    }
}
