<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (\Yii::$app->user->isGuest) : ?>
        <div class="well">
            <h1><?= Yii::t('app', 'Регистрируйся и пиши посты!') ?></h1>

            <a href="<?= \yii\helpers\Url::to(['user/register']) ?>" class="btn btn-success">
                <?= Yii::t('app', 'Регистрация') ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if (\Yii::$app->user->can('createPost')) : ?>
        <div class="body-content">

            <h2><?= Yii::t('app', 'Мои посты') ?>:</h2>

            <div class="row">
                <?php foreach(\Yii::$app->user->identity->posts as $post): ?>
                    <?php /** @var \app\models\Posts $post */ ?>
                    <div class="col-lg-4">
                        <h2><?= $post->title ?></h2>

                        <p><?= $post->body ?></p>

                        <p><a class="btn btn-default" href="<?= $post->getUrl() ?>">
                                <?= Yii::t('app', 'Читать') ?>...</a></p>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    <?php endif; ?>

</div>
