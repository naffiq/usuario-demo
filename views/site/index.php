<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (\Yii::$app->user->can('admin')) : ?>
        <div class="jumbotron">
            <h1>Congratulations!</h1>
    
            <p class="lead">You have successfully created your Yii-powered application.</p>
    
            <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        </div>
    <?php endif; ?>

    <div class="body-content">

        <div class="row">
            <?php foreach(\Yii::$app->user->identity->posts as $post): ?>
                <?php /** @var \app\models\Posts $post */ ?>
                <div class="col-lg-4">
                    <h2><?= $post->title ?></h2>

                    <p><?= $post->body ?></p>

                    <p><a class="btn btn-default" href="<?= \yii\helpers\Url::to(['posts/view', 'id' => $post->id]) ?>">
                        Читать...</a></p>
                </div>

            <?php endforeach ?>
        </div>

    </div>
</div>
