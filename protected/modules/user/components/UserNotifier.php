<?php

class UserNotifier {
    static function registration( $event )
    {
        $user = $event->sender;

        // добавляем в базу запись о необходимости подтверждения регистрации
        $confim = new CatalogUsersConfirm();
        $confim->user_id = $user->id;
        $confim->date = time();
        $confim->confirm_key = substr( md5( $user->email.time() ), 0, 8 );
        $confim->type = "registration";
        $confim->save();
        if( $confim->hasErrors() && sizeof( $confim )>0 )
        {
            $errors = "Ошибка сохранение запис для подтвержджения регистрации: ";
            foreach( $confim->getErrors() as $data )
                foreach( $data as $key=>$value )$errors .= $value.", ";

            throw new Exception( $errors );
        }
            else
        {
            // Отправляем письмо для подтверждения Email
            Yii::app()->notifications->send( "registration_confirm", array( "mail" ), $user->id );
        }
    }

    static function registrationConfirm( $event )
    {
        $confirm = CatalogUsersConfirm::findByAttributes( array("confirm_key"=> SiteHelper::checkedVaribal( $_GET["confirm_key"], "string" ), "type"=>"registration"), 0 );
        $user = $confirm[0]->user_id;
        // Изменяем статус пользователя
        $user->active = 1;
        $user->save();
        if( $user->hasErrors() && sizeof( $user )>0 )
        {
            $errors = "Ошибка сохранение подтвержджения регистрации: ";
            foreach( $user->getErrors() as $data )
                foreach( $data as $key=>$value )$errors .= $value.", ";

            throw new Exception( $errors );
        }
            else
        {
            // Удаляем запись в базе о необходимости подтверждения
            if( sizeof( $confirm )>0 )$confirm[0]->delete();

            // Отправляем письмо для подтверждения Email
            Yii::app()->notifications->send( "registration_successfully", array( "mail" ), $user->id );
        }

    }

    static function updateDateVisit( $event )
    {
        $user = $event->sender;
        $user->last_visit = time();
        $user->save();
    }

    static function lostPassword( $event )
    {
        $user = $event->sender;

        // добавляем в базу запись о необходимости подтверждения регистрации
        $confim = new CatalogUsersConfirm();
        $confim->user_id = $user->id;
        $confim->date = time();
        $confim->confirm_key = substr( md5( $user->email.time() ), 0, 8 );
        $confim->type = "lostpassword";
        $confim->save();
        if( $confim->hasErrors() && sizeof( $confim )>0 )
        {
            $errors = "Ошибка сохранение подтвержджения востановление пароля: ";
            foreach( $confim->getErrors() as $data )
                foreach( $data as $key=>$value )$errors .= $value.", ";

            throw new Exception( $errors );
        }
            else
        {
            // Отправляем письмо для подтверждения Email
            Yii::app()->notifications->send( "lostpassword_request", array( "mail" ), $user->id );
        }
    }

    static function lostPasswordConfirm( $event )
    {
        $userSender = $event->sender;
        $user = CatalogUsers::fetch( $userSender->id );
        $user->password = md5( $userSender->password );
        $user->save();

        if( $user->hasErrors() && sizeof( $user )>0 )
        {
            $errors = "Ошибка сохранение нового пароля: ";
            foreach( $user->getErrors() as $data )
                foreach( $data as $key=>$value )$errors .= $value.", ";

            throw new Exception( $errors );
        }
            else
        {
            // Отправляем письмо уведомления о смене пароля
            Yii::app()->notifications->send( "lostpassword_save", array( "mail" ), $user->id );
        }
    }
}