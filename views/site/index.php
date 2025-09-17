<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Мини-блог';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Мини-блог</h1>
        <p class="lead">Добро пожаловать в наш мини-блог!</p>
        
        <div class="text-right">
            <?php if (Yii::$app->user->isGuest): ?>
                <?= Html::a('Войти', ['site/login'], ['class' => 'btn btn-primary']) ?>
            <?php else: ?>
                <?= Html::a('Мои посты', ['post/my-posts'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Выйти', ['site/logout'], [
                    'class' => 'btn btn-danger',
                    'data' => ['method' => 'post']
                ]) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="body-content">
        <h2>Все посты</h2>
        
        <?php if (empty($posts)): ?>
            <div class="alert alert-info">Пока нет постов.</div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Html::encode($post->title) ?></h3>
                    </div>
                    <div class="panel-body">
                        <?= nl2br(Html::encode($post->content)) ?>
                    </div>
                    <div class="panel-footer text-muted">
                        Автор: <?= Html::encode($post->user->email) ?> | 
                        Дата: <?= Yii::$app->formatter->asDatetime($post->created_at) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>