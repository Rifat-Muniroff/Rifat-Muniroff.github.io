<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал пользователей</h1>

<?php echo CHtml::link('Расширенный поиск','#', ['class'=>'search-button']); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search', [
		'model'=>$model,
	]); ?>
</div><!-- search-form -->
<?php echo CHtml::form(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', [
	'id'=>'user-grid',
	'selectableRows'=>1,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>[
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
		'username',
        'email',
		'created'=>[
			'name'=>'created',
			'value'=>'date("j.m.Y (H:i)",$data->created)',
			'filter'=>false,
			'headerHtmlOptions'=>[
				'width'=>50
			]
		],
		'ban'=>[
			'name'=>'ban',
			'value'=>'($data->ban==1)?"Бан":" "',
			'filter'=>[1=>'Да',0=>'Нет'],
			'headerHtmlOptions'=>[
				'width'=>20
			]
		],
		'role'=>[
			'name'=>'role',
			'value'=>'($data->role==0)?"User":"Admin"',
			'filter'=>[1=>'Admin',0=>'User'],
			'headerHtmlOptions'=>[
				'width'=>20
			]
		],
		[
			'class'=>'CButtonColumn',
		],
	],
]);

echo 'Операции над пользователями: <br/>';
echo CHtml::submitButton('Разбанить', ['name'=>'noban']).' ';
echo CHtml::submitButton('Забанить', ['name'=>'ban']).' ';
echo CHtml::submitButton('Назначить админом', ['name'=>'admin']).' ';
echo CHtml::submitButton('Снять полномочия админа', ['name'=>'noadmin']).' ';
echo CHtml::submitButton('Удалить', ['name'=>'delete']).' ';
echo CHtml::endForm();
