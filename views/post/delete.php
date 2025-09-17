<?php
use yii\helpers\Html;

$this->title = 'Удалить пост';
?>
<div class="post-delete">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <p>Вы уверены, что хотите удалить этот пост?</p>
        <p><strong><?= Html::encode($model->title) ?></strong></p>
    </div>

    <?= Html::beginForm() ?>
        <div class="form-group">
            <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']) ?>
            <?= Html::a('Отмена', ['my-posts'], ['class' => 'btn btn-default']) ?>
        </div>
    <?= Html::endForm() ?>
</div>