<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
		<?php
	$this->beginWidget('zii.widgets.CPortlet', [
	'title'=>'',
	]);
	$this->widget('zii.widgets.CMenu', [
	'items'=>Category::menu(0),
	'htmlOptions'=> ['class'=>'operations'],
	]);
	$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
