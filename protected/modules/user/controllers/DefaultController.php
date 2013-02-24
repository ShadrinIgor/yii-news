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
        $user =  new CatalogUsersRegistration();

        if( !empty( $_POST["CatalogUsersRegistration"] ) )
        {
            $user->setAttributes( $_POST["CatalogUsersRegistration"] );
            if( $user->save() )
            {
                $user->onRegistration( new CModelEvent($user) );
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

    public function actionConfirm()
    {
        $error = true;
        $errorMessage = null;
        $sekretKey = SiteHelper::checkedVaribal( $_GET["confirm_key"], "string" );
        if( !empty( $sekretKey ) )
        {
            $registrationConfirm = CatalogUsersConfirm::findByAttributes( array( "confirm_key"=>$sekretKey ) );
            if( sizeof($registrationConfirm)>0 )
            {
                $user = $registrationConfirm[0]->user_id;
                $user->onRegistrationConfirm( new CModelEvent( $user ) );
                $error = false;
            }
                else $error = true;
        }
            else $error = true;

        $this->render( "confirm", array( "error"=>$error, "error_message" => $errorMessage ) );
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
                $user->onLogin( new CModelEvent( $user ) );
                $this->redirect( $this->createUrl( "default/room/" ) );
            }
        }

        $this->render('login',array('form'=>$user));
	}

    /**
     * Displays the lost password page
     */
    public function actionLost()
    {
        $user =  new CatalogUsersLost();

        if( !empty( $_POST["CatalogUsersLost"] ) )
        {
            $user->setAttributes( $_POST["CatalogUsersLost"] );
            if( $user->validate() )
            {
                $userByEmail = CatalogUsers::findByAttributes( array("email"=>$user->email) );
                $user->onLostPassword( new CModelEvent( $userByEmail[0] ) );
                $this->redirect( $this->createUrl( "default/lost/successfully/" ) );
            }
        }

        if( isset( $_GET["successfully"] ) )$okMessage = "<b>Запрос на востановление пароля сохранен.</b><br/>В течении нескольких минут к Вам на почту придет письмо для подтверждения запроса";
                                       else $okMessage=null;

        $this->render('lost',array('form'=>$user, "okMessage"=>$okMessage ));
    }


    /**
     * Displays the lost password page
     */
    public function actionLostConfirm()
    {
        $error = false;
        $user =  new CatalogUsersLostConfirm();

        if( !isset( $_GET["successfully"] ) )
        {
            $key = ( !empty( $_GET["key"] ) ) ? SiteHelper::checkedVaribal( $_GET["key"], "string" ) : "";
            if( !empty( $key ) )
            {
                $lostConfirm = CatalogUsersConfirm::findByAttributes( array( "confirm_key"=>$key, "type"=>"lostpassword" ) );
                if( empty( $lostConfirm ) || sizeof( $lostConfirm ) == 0 )$error = true;
            }
                else $error = true;
        }

        if( empty( $error ) && !empty( $_POST["CatalogUsersLostConfirm"] ) )
        {
            $user->setAttributes( $_POST["CatalogUsersLostConfirm"] );
            $confirm = CatalogUsersConfirm::findByAttributes( array( "confirm_key"=>$key ) );
            $userDB = CatalogUsersLostConfirm::fetch( $confirm[0]->user_id->id );
            $userDB->password = $user->password;
            $userDB->password2 = $user->password2;

            if( $userDB->validate() )
            {
                $userDB->onLostPasswordConfirm( new CModelEvent( $userDB ) );
                $this->redirect( $this->createUrl( "default/lostconfirm/successfully/" ) );
            }
        }

        if( isset( $_GET["successfully"] ) )$okMessage = "<b>Новый пароль успешно сохранен.</b><br/>Вы можете авторизоваться используя новый пароль";
                                       else $okMessage=null;

        $this->render('lostconfirm',array('form'=>$user, "error"=>$error, "okMessage"=>$okMessage));
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
};