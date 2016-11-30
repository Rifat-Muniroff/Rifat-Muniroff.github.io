<?php
if($model->status!=0): ?>

<?php
    $this->breadcrumbs= [
    'Категория: '.$model->category->title => ['index','id'=>$model->category_id],
    $model->title
];
?>
<h1><?php echo $model->title; ?></h1>
    <?php echo date('j.m.Y H:i',$model->created); ?>
<hr/>
<?php echo $model->content; ?>

<hr/>
<?php if(Yii::app()->user->hasFlash('comment')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('comment'); ?>
    </div>
<?php else:
    echo $this->renderPartial('newComment', ['model'=>$newComment]);
endif;
?>

<?php $this->widget('zii.widgets.CListView', [
    'dataProvider'=>Comment::all($model->id),
    'itemView'=>'_viewComment',
]); ?>
<?php endif; ?>