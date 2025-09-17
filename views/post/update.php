<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактировать пост';
?>
<div class="post-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Отмена', ['my-posts'], ['class' => 'btn btn-default']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>