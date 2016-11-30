<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->menu= [
	['label'=>'Журнал категорий', 'url'=> ['index']],
	['label'=>'Создать категорию', 'url'=> ['create']],
];
?>

<h1>Изменение категории #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>