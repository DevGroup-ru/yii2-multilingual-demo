<?php

namespace app\controllers;

use app\components\BackendController;
use app\models\AdminPage;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class AdminPagesController extends BackendController
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
        $searchModel = new AdminPage();
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
        /** @var AdminPage|\DevGroup\Multilingual\behaviors\MultilingualActiveRecord $model */
        $model = AdminPage::loadModel(
            $id,
            true,
            true,
            86400,
            new NotFoundHttpException()
        );
        if ($model->isNewRecord === true) {
            $model->created_at = date('Y-m-d H:i:s');
        } else {
            // populate translations relation as we need to save all
            $model->translations;
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('PageTranslation', []) as $language => $data) {
                foreach ($data as $attribute => $translation) {
                    $model->translate($language)->$attribute = $translation;
                }
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Object saved.'));
                return $this->redirect(['/admin-pages/edit', 'id' => $model->id]);
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
        /** @var AdminPage|\DevGroup\Multilingual\behaviors\MultilingualActiveRecord $model */
        $model = AdminPage::loadModel(
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
