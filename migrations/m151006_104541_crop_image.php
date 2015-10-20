<?php

use yii\db\Migration;

class m151006_104541_crop_image extends Migration
{
    public function up()
    {
        $this->addColumn('{{%post}}', 'photo_crop', $this->string());
        $this->addColumn('{{%post}}', 'photo_cropped', $this->string());
        $this->addColumn('{{%post}}', 'photo', $this->string());
    }

    public function down()
    {
        $this->dropColumn('{{%post}}', 'photo');
        $this->dropColumn('{{%post}}', 'photo_crop');
        $this->dropColumn('{{%post}}', 'photo_cropped');
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
