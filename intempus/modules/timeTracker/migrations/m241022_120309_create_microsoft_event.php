<?php

namespace app\modules\timeTracker\migrations;

use yii\db\Migration;

/**
 * Class m241022_120309_create_microsoft_event
 */
class m241022_120309_create_microsoft_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%microsoft_event}}', [
            'id' => $this->primaryKey(),
            'subject' => $this->string()->null(),
            'microsoft_id' => $this->string()->null(),

            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%microsoft_event}}');
    }
}
