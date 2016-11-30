<?php
/* @var $this PageController */
/* @var $model Page */

$this->menu= [
	['label'=>'Создать страницу', 'url'=> ['create']],
];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал страниц</h1>

<?php echo CHtml::link('Расширенный поиск','#', ['class'=>'search-button']); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', [
	'model'=>$model,
]); ?>
</div><!-- search-form -->
<?php echo CHtml::form(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'page-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=> [
		[
			'class'=>'CCheckBoxColumn',
			'id'=>'User_id',
		],
		'id'=>[
			'name'=>'id',
			'headerHtmlOptions'=>[
				'width'=>10
			]
		],
		'title'=>[
			'name'=>'title',
			'headerHtmlOptions'=>[
				'width'=>270
			]
		],
		'created'=>[
			'name'=>'created',
			'value'=>'date("j.m.Y (H:i)",$data->created)',
			'filter'=>false,
		],
		'status'=>[
			'name'=>'status',
			'value'=>'($data->status==0)?"Скрыто":"Доступно"',
			'filter'=>[0=>'Скрыто',1=>'Доступно'],
			'headerHtmlOptions'=>[
				'width'=>60
			]
		],
		'category_id'=>[
			'name'=>'category_id',
			'value'=>'$data->category->title',
			'filter'=>Category::all(),
			'headerHtmlOptions'=>[
				'width'=>100
			]
		],
		[
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'CHtml::normalizeUrl(array("/page/view","id"=>$data->id))'
		],
	],
]);

echo 'Операции над страницами: <br/>';
echo CHtml::submitButton('Подтвердить', ['name'=>'show']).' ';
echo CHtml::submitButton('Скрыть', ['name'=>'hide']).' ';
echo CHtml::endForm();
