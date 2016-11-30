<h1>Настройки</h1>

<?php if(Yii::app()->user->hasFlash('settings')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('settings'); ?>
    </div>
<?php endif; ?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'settings-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="row">
        <?php echo $form->label($model,'defaultStatusComment'); ?>
        <?php echo $form->checkBox($model,'defaultStatusComment'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'defaultStatusUser'); ?>
        <?php echo $form->checkBox($model,'defaultStatusUser'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->