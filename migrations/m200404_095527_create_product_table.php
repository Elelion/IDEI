<?php

use yii\db\Migration;
use app\models\Product;
use app\models\Category;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200404_095527_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'category_id' => $this->tinyInteger()->unsigned()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
        ], 'charset=utf8');

        $this->createIndex('idx_category_id', '{{%product}}', 'category_id');
        $this->createIndex('idx_created_at', '{{%product}}', 'created_at');

        //$this->addForeignKey(
        //    'fk_product_category',
        //    Product::tableName(),
        //    'category_id',
        //    Category::tableName(),
        //    'id'
        //);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropForeignKey(
        //    'fk_product_category',
        //    Product::tableName()
        //);

        $this->dropIndex('idx_created_at', '{{%product}}');
        $this->dropIndex('idx_category_id', '{{%product}}');

        $this->dropTable('{{%product}}');
    }
}
