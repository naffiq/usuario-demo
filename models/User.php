<?php

namespace app\models;

/**
 * Class User
 *
 * @property Posts[] $posts Посты пользователя
 *
 * @package app\models
 */
class User extends \Da\User\Model\User
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['author_id' => 'id']);
    }
}
