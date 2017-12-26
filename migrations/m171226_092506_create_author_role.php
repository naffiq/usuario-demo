<?php

use yii\db\Migration;

/**
 * Class m171226_092506_create_author_role
 */
class m171226_092506_create_author_role extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $authManager = \Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $authManager->createPermission('createPost');
        $createPost->description = 'Create a post';
        $authManager->add($createPost);

        // add "updatePost" permission
        $updatePost = $authManager->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $authManager->add($updatePost);

        $author = $authManager->createRole('author');
        $author->description = 'Все зарегистрированные пользователи сайта';

        $authManager->add($author);
        $authManager->addChild($author, $createPost);

        $admin = $authManager->getRole('admin');
        $authManager->addChild($admin, $createPost);
        $authManager->addChild($admin, $updatePost);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $authManager = \Yii::$app->authManager;

        $author = $authManager->getRole('author');
        $authManager->remove($author);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171226_092506_create_author_role cannot be reverted.\n";

        return false;
    }
    */
}
