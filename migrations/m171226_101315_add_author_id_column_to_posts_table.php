<?php

use yii\db\Migration;

/**
 * Handles adding author_id to table `posts`.
 */
class m171226_101315_add_author_id_column_to_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('posts', 'author_id', $this->integer()->notNull());

        $this->addForeignKey('fk_posts_author',
            'posts', 'author_id',
            'user', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('posts', 'author_id');
    }
}
