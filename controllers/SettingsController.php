<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 12/26/17
 * Time: 16:54
 */

namespace app\controllers;

use app\controllers\common\AdminController;

class SettingsController extends AdminController
{

    public function behaviors()
    {
        $parentBehaviors = parent::behaviors();

        $parentBehaviors['access']['rules'][] = [
            'allow' => true,
            'actions' => ['view'],
            'roles' => ['author']
        ];

        return $parentBehaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }
}