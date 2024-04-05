<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%object_map}}`.
 */
class m240404_223638_create_object_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%object_map}}', [
            'id' => $this->primaryKey(),
            'object_type' => $this->string()->notNull(),
            'model_class' => $this->string()->notNull(),
        ]);

        foreach (file(__DIR__ . '/init/object_map.sql') as $sql) {
            $this->execute($sql);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%object_map}}');
    }
}
