<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Подключаем стили -->
    <?php
    \app\assets\AppAsset::register($this);
    ?>
    
    <!-- Дополнительные стили для страницы логина -->
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('../../web/images/Shape.png');
            background-color: #4880FF;
            
            padding: 20px;
        }
        
        .login-form {
            background: white;
            padding: 50px;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
        }

        .login-subtitle {
            font-weight: 600;
            color: #202224;
            opacity: 80%;
        }
        
        .login-title {
            text-align: center;
              font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            font-weight: 700;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap:15px;
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 12px 15px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.2);
        }

        .form-buttons {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .help-block:empty {
            display: none;
        }
        
    </style>
    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="login-container">
    <div class="login-form">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>