<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->menu= [
	['label'=>'Журнал комментариев', 'url'=> ['index']],
	['label'=>'Удалить комментарий', 'url'=>'#', 'linkOptions'=> [
		'submit'=> ['delete','id'=>$model->id],
		'confirm'=>'Вы уверены, что хотите удалить этот комментарий?']
	],
];
?>

<h1>Просмотр комментария #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', [
	'data'=>$model,
	'attributes'=> [
		'id',
		'page_id'=>[
			'name'=>'page_id',
			'value'=>$model->page->title,
		],
		'created'=>[
			'name'=>'created',
			'value'=>date("j.m.Y H:i", $model->created),
		],
		'user_id'=>[
			'name'=>'user_id',
			'value'=>$model->user->username,
		],
		'guest',
	],
]); ?>
