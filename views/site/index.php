<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Мини-блог';
?>
<div class="site-index">
    
    <div class="body-content">
        
        <?php if (empty($posts)): ?>
            <div class="alert alert-info">Type Ypur First Post!</div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Html::encode($post->title) ?></h3>
                    </div>
                    <div class="panel-body">
                        <span><?= nl2br(Html::encode($post->content)) ?></span>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>