<?php

/**
 */

class initNotifications extends CApplicationComponent
{
    /*
     * Инициализация
     */
    public function init( )
    {
        Yii::import("ext.notifications.models.*");
    }

    public function send( $key, $types, array $arrayParams = array() )
    {
        $notification = Notifications::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "key=:key" )
                    ->setParams( array( ":key"=>$key ) )
            );

        if( !empty( $notification ) && sizeof( $notification )>0 )
        {
            $sqlType = "";
            // Если типы заданы масивом то формирум параметр для запроса
            if( !empty( $types ) )
            {
                if( is_array( $types ))$sqlType = "'".implode( "','", $types )."'";
                                  else $sqlType = $types;
            }

            $notificationItems = NotificationsItems::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "notification_id=:notification_id AND type=:type" )
                    ->setParams( array( ":notification_id"=>$notification->id, ":type"=>$sqlType ) )
            );

            //print_r)
            if( !empty( $notificationItems ) && sizeof( $notificationItems )>0 )
            {
                for( $i=0;$i<sizeof( $notificationItems );$i++ )
                {

                }
            }
                else return false;
        }
            else return false;
    }
}
?>
