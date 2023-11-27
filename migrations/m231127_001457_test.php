<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m231127_001457_test
 */
class m231127_001457_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => 'pk',
            'name'=> Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231127_001457_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231127_001457_test cannot be reverted.\n";

        return false;
    }
    */
}
