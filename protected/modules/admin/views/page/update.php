<?php
/* @var $this PageController */
/* @var $model Page */

$this->menu= [
	['label'=>'Журнал страниц', 'url'=> ['index']],
	['label'=>'Создать страницу', 'url'=> ['create']],
	['label'=>'Просмотр страницы', 'url'=> ['/page/view', 'id'=>$model->id]],
];
?>

<h1>Изменение страницы #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', ['model'=>$model]); ?>