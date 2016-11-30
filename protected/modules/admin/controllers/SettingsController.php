<?php

class SettingsController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
                'roles'=>array('1'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $model=Settings::model()->findByPk(1);

        if(isset($_POST['Settings']))
        {
            $model->attributes=$_POST['Settings'];
            if($model->save())
            {
                Yii::app()->user->setFlash('settings','Сохранения удачны.');
            }
        }

        $this->render('index',array(
            'model'=>$model,
        ));
    }
}