<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\widgets\Alert;

$this->title = 'Мои посты';
?>
<div class="post-my-posts">
    <?= Alert::widget() ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            
             <?= $form->field($model, 'title')->textInput([
            'placeholder' => 'Title',
            'class' => ['textfield post-title-input']
        ])->label(false) ?>

            <?= $form->field($model, 'content')->textarea([
            'rows' => 6,
            'placeholder' => 'Description',
            'class' => ['textfield post-desc-input']
        ])->label(false) ?>
            
                <div class="form-buttons">
                    <?= Html::submitButton('Add', ['class' => 'button button-primary']) ?>
                </div>
                

            
            <?php ActiveForm::end(); ?>
        </div>
    </div>
   
     <?php if (empty($posts)): ?>
        <div class="alert alert-info">Type Your First Post!</div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <?php $form = ActiveForm::begin([
                'action' => ['update', 'id' => $post->id],
                'options' => ['class' => 'post-edit-form']
            ]); ?>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= $form->field($post, 'title')->textInput([
                        'class' => 'textfield form-control post-title-edit',
                        'placeholder' => 'Title'
                    ])->label(false) ?>
                </div>
                
                <div class="panel-body">
                    <?= $form->field($post, 'content')->textarea([
                        'rows' => 4,
                        'class' => 'textfield form-control post-desc-edit',
                        'placeholder' => 'Description'
                    ])->label(false) ?>
                </div>
                
                <div class="panel-footer">
                    
                    <?= Html::a('Delete', ['delete', 'id' => $post->id], [
                        'class' => 'button button-secondary',
                        'data' => [
                            'confirm' => 'Are you sure?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::submitButton('Save', ['class' => 'button button-primary']) ?>
                </div>
            </div>
            
            <?php ActiveForm::end(); ?>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget([
                'pagination' => $pagination,
                'options' => ['class' => 'pagination'],
                'activePageCssClass' => 'active',
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
                'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
            ]) ?>
        </div>

    <?php endif; ?>
</div>