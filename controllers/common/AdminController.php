<?php
/**
 * Created by PhpStorm.
 * User: naffiq
 * Date: 12/26/17
 * Time: 16:52
 */

namespace app\controllers\common;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

abstract class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ]
        ];
    }

}