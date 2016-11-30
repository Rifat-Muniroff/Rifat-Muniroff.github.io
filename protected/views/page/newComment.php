<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', [
        'id'=>'comment-form',
        'enableAjaxValidation'=>false,
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content', ['rows'=>6, 'cols'=>50]); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>

<?php
    if(Yii::app()->user->isGuest):
?>

    <div class="row">
        <?php echo $form->labelEx($model,'guest'); ?>
        <?php echo $form->textField($model,'guest', ['size'=>15,'maxlength'=>15]); ?>
        <?php echo $form->error($model,'guest'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha',[
                    'showRefreshButton' => false,
                    'clickableImage' => true,
                    'imageOptions' => [
                        'title' => 'Обновить',
                        'style' => 'cursor: pointer;'
                    ]
                ]); ?>
                <?php echo $form->textField($model,'verifyCode'); ?>
            </div>
            <div class="hint">Пожалуйста, введите буквы, изображенные на картинке выше.
                <br/> Буквы не чувствительны к регистру.</div>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
    <?php endif;
    endif; ?>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton('Отправить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->