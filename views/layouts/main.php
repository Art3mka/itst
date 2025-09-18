<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    $controller = Yii::$app->controller;
    $action = Yii::$app->controller->action;

    $isMyPostsPage = ($controller->id === 'post' && $action->id === 'my-posts');
    $pageTitle = $isMyPostsPage ? 'My Posts' : 'Posts';
    $toggleButtonText = $isMyPostsPage ? 'All Posts' : 'My Posts';
    $toggleButtonUrl = $isMyPostsPage ? ['/site/index'] : ['/post/my-posts'];
    
    NavBar::begin([
        'brandLabel' => Html::tag('span', $pageTitle, ['class' => 'navbar-title']),
        'brandUrl' => null,
        'options' => [
            'class' => 'navbar navbar-expand navbar-light fixed-top',
        ],

    ]);
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login',
         'url' => ['/site/login'],
        'linkOptions' => ['class' => 'button button-primary']];
    } else {
        $menuItems[] = ['label' => $toggleButtonText, 'url' => $toggleButtonUrl,
        'linkOptions' => ['class' => 'button button-secondary']];
        $menuItems[] = [
            'label' => 'Logout',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post', 'class' => 'button button-primary']
        ];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto gap-3'],
        'items' => $menuItems,
    ]);
    
    NavBar::end();
    ?>
    
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>