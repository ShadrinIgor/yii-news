<?php

/**
 */

class initNotifications extends CApplicationComponent
{
    public $errors = array();
    /*
     * Инициализация
     */
    public function init( )
    {
        Yii::import("ext.notifications.models.*");
    }

    public function send( $key, $types, $userId, array $arrayParams = array() )
    {
        $status = false;

        $notification = Notifications::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "`key`=:key" )
                    ->setParams( array( ":key"=>$key ) )
            );

        if( !empty( $notification ) && sizeof( $notification )>0 )
        {
            $sqlType = "";
            // Если типы заданы масивом то формирум параметр для запроса
            if( !empty( $types ) )
            {
                if( is_array( $types ))$sqlType = " AND ( `type`='".implode( "' OR `type`='", $types )."' )";
                                  else $sqlType = " AND `type`='".$types."'";
            }

            $notificationMessage = NotificationsMessages::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "notification_id=:notification_id :type" )
                    ->setParams( array( ":notification_id"=>$notification[0]->id, ":type"=>$sqlType ) )
            );

            if( !empty( $notificationMessage ) && sizeof( $notificationMessage )>0 )
            {
                for( $i=0;$i<sizeof( $notificationMessage );$i++ )
                {
                    echo $notificationMessage[$i]->type."*";
                    if( $notificationMessage[$i]->type == "info"  )
                    {
                        $NItem = new NotificationsItems();
                        $NItem->notification_id = $notification[0]->id;
                        $NItem->message_id = $notificationMessage[$i]->id;
                        $NItem->user_id = $userId;
                        $NItem->date = time();
                        $NItem->save();
                    }

                    if( $notificationMessage[$i]->type == "mail"  )
                    {
                        $userTo = CatalogUsers::fetch( $userId );
                        if( !empty( $userTo) && $userTo->id >0 )
                        {
                            $messages = $notificationMessage[$i]->mesage;
                            foreach( $arrayParams as $key=>$value )
                                $messages = str_replace( "{".$key."}", $value, $messages );

                            $this->mailto( $notificationMessage[$i]->subject, $notificationMessage[$i]->send_from, $userTo->email, $messages, $notificationMessage[$i]->copy_sender );
                            $status = true;
                        }
                            else
                            {
                                $this->errors[] = array( "Ошибка отправки сообщения", "Указынн не верный ID пользователя");
                                return false;
                            }
                    }
                }
            }
        }

        return $status;
    }

    private function mailto($subject, $from, $to, $msg, $copy='', $template='main.tpl')
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=cp1251' . "\r\n";

        $headers .= 'Date: '.date("r")."\r\n";
        $headers .= 'To: '.$to." \r\n";
        $headers .= 'From: Manager of a site glass-expo.uz<'.$from.'>' . "\r\n";

        if( $template && file_exists( "template/mails_template/".$template) )
        {
            $fullUrl = "template/mails_template/".$template;
            $file = fopen( $fullUrl, "r+" );
            $templateText = fread( $file, filesize( $fullUrl ) );
            fclose( $file );
            $msg = str_replace( "@cotent_text@", $msg, $templateText );
        }

        $headers = iconv("UTF-8", "cp1251", $headers);
        $msg = iconv("UTF-8", "cp1251", $msg);
        $subject = iconv("UTF-8", "cp1251", $subject);

//   echo $to.",".$subject.",".$msg.",".$headers;
        $res=@mail($to,$subject,$msg,$headers);

        if($res===false)$error="Произошла ошибка отправки сообщения на E-mail (<b>".$to."</b>). Проверте коректность вводимого E-mail и попробуйте снова.";

        return $error;
    }
}
?>
