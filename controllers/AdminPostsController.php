<?php

namespace app\controllers;

use app\components\BackendController;
use app\models\AdminPost;
use DevGroup\DeferredTasks\helpers\OnetimeTask;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class AdminPostsController extends BackendController
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
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new AdminPost();
        $params = Yii::$app->request->get();
        $dataProvider = $searchModel->search($params);

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]
        );
    }

    public function actionEdit($id = '')
    {
        /** @var AdminPost|\DevGroup\Multilingual\behaviors\MultilingualActiveRecord $model */
        $model = AdminPost::loadModel(
            $id,
            true,
            true,
            86400,
            new NotFoundHttpException()
        );
        if ($model->isNewRecord === true) {
            $model->created_at = date('Y-m-d H:i:s');
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('PostTranslation', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }

            if ($model->save()) {
                if (empty($id)) {
                    $newsletterTask = new OnetimeTask();
                    $newsletterTask
                        ->consoleRoute('newsletter/send-post', [$model->id])
                        ->registerTask();

                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Object saved.'));
                return $this->redirect(['/admin-posts/edit', 'id' => $model->id]);
            }
        }
        return $this->render(
            'edit',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * @param $id
     *
     * @return \yii\web\Response
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        /** @var AdminPost|\DevGroup\Multilingual\behaviors\MultilingualActiveRecord $model */
        $model = AdminPost::loadModel(
            $id,
            false,
            true,
            86400,
            new NotFoundHttpException()
        );
        $model->delete();
        Yii::$app->session->setFlash('warning', Yii::t('app', 'Object has been deleted.'));
        return $this->redirect('index');
    }
}
