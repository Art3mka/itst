<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Мои посты';
?>
<div class="post-my-posts">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Создать новый пост</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            
            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
            
            <div class="form-group">
                <?= Html::submitButton('Создать пост', ['class' => 'btn btn-success']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <h2>Мои посты</h2>
    
    <?php if (empty($posts)): ?>
        <div class="alert alert-info">У вас пока нет постов.</div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($post->title) ?></h3>
                </div>
                <div class="panel-body">
                    <?= nl2br(Html::encode($post->content)) ?>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6 text-muted">
                            Дата: <?= Yii::$app->formatter->asDatetime($post->created_at) ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <?= Html::a('Редактировать', ['update', 'id' => $post->id], ['class' => 'btn btn-xs btn-primary']) ?>
                            <?= Html::a('Удалить', ['delete', 'id' => $post->id], [
                                'class' => 'btn btn-xs btn-danger',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот пост?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>