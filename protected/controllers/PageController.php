<?php

class PageController extends Controller
{
	public function actions()
	{
		return [
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=> [
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			],
		];
	}

	public function actionIndex($id)
	{
		$models = Page::model()->findAllByAttributes(['category_id'=>$id, 'status'=>1]);
		$category = Category::model()->findByPk($id);
		$this->render('index',['models'=>$models, 'category'=>$category]);
	}

	public function actionView($id)
	{
		$model = Page::model()->findByPk($id);
		$newComment = new Comment;
		if(Yii::app()->user->isGuest)
			$newComment->scenario='Guest';
		
		if(isset($_POST['Comment']))
		{
			$settings=Settings::model()->findByPk(1);
			$newComment->attributes=$_POST['Comment'];
			$newComment->page_id=$model->id;
			if(($settings->defaultStatusComment==0)){
				$newComment->status=0;
			} else{
				$newComment->status=1;
			}
			if($newComment->save()) {
				if (($settings->defaultStatusComment == 0)) {
					Yii::app()->user->setFlash('comment', 'Ждите подтверждения комментария.');
				} else {
					Yii::app()->user->setFlash('comment', 'Ваш комментарий опубликован.');
				}
			$this->refresh();
			}
		}
		
		$this->render('view',['model'=>$model,'newComment'=>$newComment]);
	}
}