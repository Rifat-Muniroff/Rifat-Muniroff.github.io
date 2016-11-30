<?php if(Yii::app()->user->hasFlash('registration')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('registration'); ?>
	</div>
<?php else: ?>

<?php
$this->pageTitle=Yii::app()->name . ' - Регистрация';
?>

<h1>Регистрация нового пользователя</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', [
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
]); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', ['size'=>60,'maxlength'=>255]); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', ['size'=>60,'maxlength'=>255]); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email', ['size'=>60,'maxlength'=>255]); ?>
		<?php echo $form->error($model,'email'); ?>
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
					],
				]); ?>
				<?php echo $form->textField($model,'verifyCode'); ?>
			</div>
			<div class="hint">Пожалуйста, введите буквы, изображенные на картинке выше.
				<br/> Буквы не чувствительны к регистру.</div>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Регистрация'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>