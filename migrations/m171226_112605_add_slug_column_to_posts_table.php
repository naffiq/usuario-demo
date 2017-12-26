<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `posts`.
 */
class m171226_112605_add_slug_column_to_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('posts', 'slug', $this->string());

        $this->createIndex('uq_posts_slug', 'posts', 'slug', true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('posts', 'slug');
    }
}
