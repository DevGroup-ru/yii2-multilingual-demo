<?php

namespace app\commands;

use app\models\NewsletterSubscribers;
use app\models\Post;
use DevGroup\Multilingual\models\Language;
use Yii;
use yii\console\Controller;
use yii\helpers\ArrayHelper;

class NewsletterController extends Controller
{
    public $defaultAction = 'send-post';

    public function actionSendPost($postId)
    {
        /** @var \app\models\Post $post */
        $post = Post::loadModel($postId);
        if ($post === null) {
            $this->stderr("Post $postId not found.");
            return 1;
        }
        $emails = NewsletterSubscribers::find()
            ->select('email, language_id')
            ->groupBy('email')
            ->asArray()
            ->all();

        $emails = ArrayHelper::map($emails, 'email', 'email', 'language_id');

        $mailer = Yii::$app->mailer;

        foreach ($emails as $language_id => $emailsList) {
            /** @var Language $language */
            $language = Language::findOne($language_id);

            if ($language !== null && $post->hasTranslation($language_id)) {
                Yii::$app->language = $language->yii_language;
                foreach ($emailsList as $email) {
                    $message = $mailer->compose('new-post', [
                        'language_id' => $language_id,
                        'post' => $post,
                    ]);
                    $message->setFrom('amadablamorg@yandex.ru')
                        ->setTo($email)
                        ->setSubject(Yii::t('app', 'New post on Ama-Dablam.org'))
                        ->send();
                }
            }
        }

        return 0;
    }
}
