<?php
/* @var $this PageController */
/* @var $model Page */

$this->menu= [
	['label'=>'Журнал страниц', 'url'=> ['index']],
];
?>

<h1>Создать страницу</h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>