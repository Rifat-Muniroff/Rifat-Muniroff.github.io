<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->menu= [
	['label'=>'Создать категорию', 'url'=> ['create']],
];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал категорий</h1>

<?php echo CHtml::link('Расширенный поиск','#', ['class'=>'search-button']); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', [
	'model'=>$model,
]); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=> [
		'id'=>[
			'name'=>'id',
			'headerHtmlOptions'=>[
				'width'=>10
			]
		],
		'title'=>[
			'name'=>'title',
			'headerHtmlOptions'=>[
				'width'=>500
			]
		],
		'position'=>[
			'name'=>'position',
			'value'=>'($data->position==0)?"Слева":"Сверху"',
			'filter'=>[0=>'Слева',1=>'Сверху'],
			'headerHtmlOptions'=>[
				'width'=>30
			]
		],
		[
			'class'=>'CButtonColumn',
			'viewButtonOptions'=>['style'=>'display:none'],
		],
	],
]); ?>
