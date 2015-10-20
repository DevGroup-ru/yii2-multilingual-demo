<?php

use yii\db\Migration;

class m151020_095905_example_data extends Migration
{
    public function up()
    {
        // multilingual post example
        $this->insert(
            '{{%post}}',
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 1,
                'language_id' => 1,
                'title' => 'Example multilingual post',
                'announce' => 'This is a multilingual post announce. This post will be displayed in both ru and en languages.',
                'content' => 'This is a multilingual post <b>content</b>. This post will be displayed in both ru and en languages.',
                'is_published' => 1,
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 1,
                'language_id' => 2,
                'title' => 'Пример многоязычного поста',
                'announce' => 'Это анонс многоязычного поста, который будет показываться и на английской версии, и на русской.',
                'content' => 'А это <b>контент</b> многоязычного поста. Мы его можем посмотреть и в русской, и в английской версии.',
                'is_published' => 1,
            ]
        );
        // ru-only post
        $this->insert(
            '{{%post}}',
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 2,
                'language_id' => 1,
                'title' => 'Example RUSSIAN post',
                'announce' => '[announce] This post is published only in RU language, so you should NOT see it on frontend.',
                'content' => '[content] This post is published only in RU language, so you should NOT see it on frontend.',
                'is_published' => 0,
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 2,
                'language_id' => 2,
                'title' => 'Пример русского поста',
                'announce' => '[анонс] Данный пост опубликован только для русской версии. Посетители английской версии сайта его даже не увидят.',
                'content' => '[контент] Данный пост опубликован только для русской версии. Посетители английской версии сайта его даже не увидят.',
                'is_published' => 1,
            ]
        );

        // EN-only post
        $this->insert(
            '{{%post}}',
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 3,
                'language_id' => 1,
                'title' => 'Example ENGLISH post',
                'announce' => '[announce] This post is published only in EN language, so you should NOT see it on frontend in Russian language.',
                'content' => '[content] This post is published only in EN language, so you should NOT see it on frontend in Russian language.',
                'is_published' => 1,
            ]
        );
        $this->insert(
            '{{%post_translation}}',
            [
                'model_id' => 3,
                'language_id' => 2,
                'title' => 'Пример английского поста',
                'announce' => '[анонс] Данный пост опубликован только для английской версии. Посетители русской версии сайта его даже не увидят.',
                'content' => '[контент] Данный пост опубликован только для английской версии. Посетители русской версии сайта его даже не увидят.',
                'is_published' => 2,
            ]
        );
    }

    public function down()
    {
        $this->truncateTable('{{%post}}');
        $this->truncateTable('{{%post_translation}}');
        $this->truncateTable('{{%page}}');
        $this->truncateTable('{{%page_translation}}');
        $this->truncateTable('{{%images}}');
        $this->truncateTable('{{%images_translation}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
