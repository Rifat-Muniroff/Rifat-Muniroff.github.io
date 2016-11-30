<?php
/* @var $this PageController */

$this->breadcrumbs= [
	'Категория: '.$category->title,
];
foreach ($models as $item) {
	echo CHtml::link('<h3>'.$item->title.'</h3>', ['view','id'=>$item->id]);
	echo substr($item->content,0,500);
	echo CHtml::link('Читать далее...', ['view','id'=>$item->id]);
	echo '</br></br><hr>';
}

if(!$models)
	echo 'В данной категории статей нет';