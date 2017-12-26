<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (\Yii::$app->user->can('createPost')) : ?>
        <p>
            <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'body:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => function (\app\models\Posts $model) {
                        return \Yii::$app->user->can('updatePost', ['post' => $model]);
                    },
                    'delete' => function (\app\models\Posts $model) {
                        return \Yii::$app->user->can('updatePost', ['post' => $model]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
