<?php

class DefaultController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        Yii::app()->page->title = "Страница авторизации";
		$this->render('login');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionRegistration()
    {
        $user =  new CatalogUsersRegistration(  );
        if( !empty( $_POST["CatalogUsersRegistration"] ) )
        {
            $user->setAttributes( $_POST["CatalogUsersRegistration"] );
            if($user->validate())
            {
                echo "Все круто";
            }
        }

        $arrayCountry = array();
        $listCoutnry = CatalogCountry::fetchAll();
        foreach( $listCoutnry as $key=>$data )
            $arrayCountry[ $data->id ] = $data->name;

        $title = "Регистрация";
        $this->render( "registration", array( "form"=>$user, "arrayCountry"=>$arrayCountry, "title"=>$title ) );
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}