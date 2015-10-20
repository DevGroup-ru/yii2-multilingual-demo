<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use vova07\imperavi\actions\GetAction;
use vova07\imperavi\actions\UploadAction;

class AdminController extends Controller
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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'images-get' => [
                'class' => GetAction::className(),
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => '@app/web/images', // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_IMAGES,
            ],
            'files-get' => [
                'class' => GetAction::className(),
                'url' => '/files/', // Directory URL address, where files are stored.
                'path' => '@app/web/files', // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_FILES,
            ],
            'image-upload' => [
                'class' => UploadAction::className(),
                'url' => '/images/', // Directory URL address, where files are stored.
                'path' => '@app/web/images' // Or absolute path to directory where files are stored.
            ],
            'file-upload' => [
                'class' => UploadAction::className(),
                'url' => '/files/', // Directory URL address, where files are stored.
                'path' => '@app/web/files' // Or absolute path to directory where files are stored.
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/admin/login']);
        } else {
            return $this->render('index');
        }
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
