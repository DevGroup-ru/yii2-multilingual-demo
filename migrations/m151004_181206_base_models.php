<?php

use yii\db\Migration;

class m151004_181206_base_models extends Migration
{
    public function up()
    {
        mb_internal_encoding("UTF-8");
        $tableOptions = $this->db->driverName === 'mysql'
            ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci'
            : null;

        $this->createTable(
            '{{%post}}',
            [
                'id' => $this->primaryKey(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
            ],
            $tableOptions
        );

        $this->createTable(
            '{{%post_translation}}',
            [
                'model_id' => $this->integer()->notNull(),
                'language_id' => $this->integer()->notNull(),
                'title' => $this->string()->notNull(),
                'announce' => $this->text()->notNull(),
                'content' => $this->text()->notNull(),
                'is_published' => $this->boolean()->notNull()->defaultValue(1),
            ],
            $tableOptions
        );
        $this->addPrimaryKey('pk', '{{%post_translation}}', ['model_id', 'language_id']);

        $this->createTable(
            '{{%page}}',
            [
                'id' => $this->primaryKey(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
            ],
            $tableOptions
        );

        $this->createTable(
            '{{%page_translation}}',
            [
                'model_id' => $this->integer()->notNull(),
                'language_id' => $this->integer()->notNull(),
                'title' => $this->string()->notNull(),
                'content' => $this->text()->notNull(),
                'is_published' => $this->boolean()->notNull()->defaultValue(1),
            ],
            $tableOptions
        );
        $this->addPrimaryKey('pk', '{{%page_translation}}', ['model_id', 'language_id']);

        $this->createTable(
            '{{%images}}',
            [
                'id' => $this->primaryKey(),
                'image_src' => $this->string()->notNull(),
                'sort_order' => $this->integer()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
            ],
            $tableOptions
        );
        $this->createIndex('sortorder', '{{%images}}', ['sort_order']);

        $this->createTable(
            '{{%images_translation}}',
            [
                'model_id' => $this->integer()->notNull(),
                'language_id' => $this->integer()->notNull(),
                'description' => $this->text()->notNull(),
            ],
            $tableOptions
        );
        $this->addPrimaryKey('pk', '{{%images_translation}}', ['model_id', 'language_id']);
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%post_translation}}');
        $this->dropTable('{{%page}}');
        $this->dropTable('{{%page_translation}}');
        $this->dropTable('{{%images}}');
        $this->dropTable('{{%images_translation}}');
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
