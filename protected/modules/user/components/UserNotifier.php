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
        if( sizeof( $confim )>0 )
        {
            $errors = "Ошибка сохранение подтвержджения регистрации: ";
            foreach( $confim->getErrors() as $data )
            {
                foreach( $data as $key=>$value )
                {
                    $errors .= $value.", ";
                }
            }
            throw new Exception( $errors );
        }

        // Отправляем письмо для подтверждения Email
        Yii::app()->notifications->send( "registration_confirm", array( "mail" ), $user->id );
    }

    static function registrationConfirm( $event )
    {
        $user = $event->sender;

        // Удаляем запись в базе о необходимости подтверждения
        $confirm = CatalogUsersConfirm::findByAttributes( array("user_id"=>$user->id, "type"=>"registration") );
        if( sizeof( $confirm )>0 )
            $confirm[0]->delete();

        // Изменяем статус пользователя
        $user->active = 1;
        $user->save();

        // Отправляем письмо для подтверждения Email
        Yii::app()->notifications->send( "registration_successfully", array( "mail" ), $user->id );
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
            {
                foreach( $data as $key=>$value )
                {
                    $errors .= $value.", ";
                }
            }
            throw new Exception( $errors );
        }

        // Отправляем письмо для подтверждения Email
        Yii::app()->notifications->send( "lostpassword_request", array( "mail" ), $user->id );
    }

    static function lostPasswordConfirm( $event )
    {
        $user = $event->sender;
    }
}