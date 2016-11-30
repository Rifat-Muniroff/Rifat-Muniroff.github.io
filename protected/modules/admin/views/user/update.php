<?php
/* @var $this UserController */
/* @var $model User */

$this->menu= [
	['label'=>'Журнал пользователей', 'url'=> ['index']],
	['label'=>'Просмотр пользователя', 'url'=> ['view', 'id'=>$model->id]],
];
?>

<h1>Изменение пользователя #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>