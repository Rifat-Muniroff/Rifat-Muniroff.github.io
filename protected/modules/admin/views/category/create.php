<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->menu= [
	['label'=>'Журнал категорий', 'url'=> ['index']],
];
?>

<h1>Создать категорию</h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>