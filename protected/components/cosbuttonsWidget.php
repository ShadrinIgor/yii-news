<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода социальных кнопок
 */
class cosbuttonsWidget extends CWidget
{
    public $url;
    public function run()
    {
        if( empty( $this->url ) )
        {
            $this->url = Yii::app()->params["baseUrl"].substr( Yii::app()->getRequest()->getRequestUri(), 1 );
        }

        $this->render("cos_buttons", array(
                    'url' => $this->url
        ));
    }
}
