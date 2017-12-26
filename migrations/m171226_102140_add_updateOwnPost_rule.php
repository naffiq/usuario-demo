<?php

use yii\db\Migration;

/**
 * Class m171226_102140_add_updateOwnPost_rule
 */
class m171226_102140_add_updateOwnPost_rule extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $authManager = \Yii::$app->authManager;

        $rule = new \app\rbac\AuthorRule();
        $authManager->add($rule);

        $updateOwnPost = $authManager->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Автор может редактировать/удалить свой пост';
        $updateOwnPost->ruleName = $rule->name;
        $authManager->add($updateOwnPost);

        $updatePost = $authManager->getPermission('updatePost');
        $author = $authManager->getRole('author');

        $authManager->addChild($updateOwnPost, $updatePost);
        $authManager->addChild($author, $updateOwnPost);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171226_102140_add_updateOwnPost_rule cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171226_102140_add_updateOwnPost_rule cannot be reverted.\n";

        return false;
    }
    */
}
