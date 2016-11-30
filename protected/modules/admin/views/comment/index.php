<?php
/* @var $this CommentController */
/* @var $model Comment */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал комментариев</h1>

<?php echo CHtml::link('Расширенный поиск','#', ['class'=>'search-button']); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', [
	'model'=>$model,
]); ?>
</div><!-- search-form -->
<?php echo CHtml::form(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'comment-grid',
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
		'content',
		'status'=>[
			'name'=>'status',
			'value'=>'($data->status==1)?"Доступно":"Скрыто"',
			'filter'=>[0=>'Скрыто',1=>'Доступно'],
		],
		'page_id'=>[
			'name'=>'page_id',
			'value'=>'$data->page->title',
			'filter'=>Page::all(),
		],
		'created'=>[
			'name'=>'created',
			'value'=>'date("j.m.Y (H:i)",$data->created)',
			'filter'=>false,
			'headerHtmlOptions'=>[
				'width'=>110
			]
		],
		'user_id'=>[
			'name'=>'user_id',
			'value'=>'$data->user->username',
			'filter'=>User::all(),
		],
		'guest',
		[
			'class'=>'CButtonColumn',
			'updateButtonOptions' => ['style'=>'display:none']
		],
	],
]);

echo 'Операции над комментариями: <br/>';
echo CHtml::submitButton('Подтвердить', ['name'=>'show']).' ';
echo CHtml::submitButton('Скрыть', ['name'=>'hide']).' ';
echo CHtml::endForm();