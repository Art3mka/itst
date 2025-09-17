<?php

use yii\db\Migration;

class m250917_091319_create_test_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'email' => 'test@example.com',
            'password' => Yii::$app->security->generatePasswordHash('password123'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'access_token' => Yii::$app->security->generateRandomString(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users', ['email' => 'test@example.com']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250917_091319_create_test_user cannot be reverted.\n";

        return false;
    }
    */
}
