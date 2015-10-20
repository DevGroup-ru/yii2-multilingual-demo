<?php

use yii\db\Migration;

class m151012_111228_newsletter extends Migration
{
    public function up()
    {
        $tableOptions = '';
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%newsletter_subscribers}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'subscribed_at' => $this->dateTime(),
            'language_id' => $this->integer()->notNull(),
        ], $tableOptions);


    }

    public function down()
    {
        $this->dropTable('{{%newsletter_subscribers}}');
    }
}
