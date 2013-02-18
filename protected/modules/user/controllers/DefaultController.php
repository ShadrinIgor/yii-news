<?php

class DefaultController extends Controller
{
    public function actions(){

//        Yii::import('application.extensions.kcaptcha.KCaptchaAction');
//        Yii::app()->session->remove(KCaptchaAction::SESSION_KEY);

        return array(
            'captcha'=>array(
                'class' => 'application.extensions.kcaptcha.KCaptchaAction',
                'maxLength' => 6,
                'minLength' => 5,
                'foreColor' => array(mt_rand(0, 100), mt_rand(0, 100),mt_rand(0, 100)),
                'backColor' => array(mt_rand(200, 210), mt_rand(210, 220),mt_rand(220, 230))
            )
        );
    }
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
            if( $user->save() )
            {
                $confim = new CatalogUsersConfirm();
                $confim->user_id = $user->id;
                $confim->date = time();
                $confim->confirm_key = substr( md5( $user->email.time() ), 0, 8 );
                $confim->save();

                Yii::app()->notifications->send( "registration_confirm", array( "mail" ), $user->id );
                $this->redirect( $this->createUrl( "default/Registration/successfully/" ) );
            }
        }

        $arrayCountry = array();
        $listCoutnry = CatalogCountry::fetchAll();
        foreach( $listCoutnry as $key=>$data )
            $arrayCountry[ $data->id ] = $data->name;

        $title = "Регистрация";

        if( isset( $_GET["successfully"] ) )$okMessage = "<b>Регистрация сохраненна.</b><br/>В течении нескольких минут к Вам на почту придет письмо для подтверждения Email";
                                       else $okMessage=null;

        $this->render( "registration", array( "form"=>$user, "arrayCountry"=>$arrayCountry, "title"=>$title, "okMessage"=>$okMessage ) );
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $user =  new CatalogUsersAuth();

        if( !empty( $_POST["CatalogUsersAuth"] ) )
        {
            $user->setAttributes( $_POST["CatalogUsersAuth"] );
            if( $user->validate() )
            {
                $this->redirect( $this->createUrl( "default/room/" ) );
            }
        }

        $this->render('login',array('form'=>$user));

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