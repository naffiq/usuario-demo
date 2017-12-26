<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 12/26/17
 * Time: 16:19
 */

namespace app\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($user, $item, $params)
    {
        return !empty($params['post']) && $params['post']->author_id === $user;
    }
}