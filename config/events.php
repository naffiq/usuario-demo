<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 12/26/17
 * Time: 15:34
 */

use yii\base\Event;
use Da\User\Event\UserEvent;
use Da\User\Model\User;

Event::on(User::className(), UserEvent::EVENT_AFTER_CREATE, function (Event $event) {
    $authManager = \Yii::$app->authManager;
    $author = $authManager->getRole('author');

    $authManager->assign($author, $event->sender->id);
});