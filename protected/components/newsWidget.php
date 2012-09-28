<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class newsWidget extends CWidget
{
    public $values;
    public $controller;
    public function run()
    {
        $curlManager = new CUrlManager();

        $url = $this->controller->createurl( "news/", array( "id"=>$this->values->id, "slug"=>$this->values->key_word ) );
        $this->render("news", array(
                    'values'      => $this->values,
                    'url'         => $url,
                    'controller'  => $this->controller
            ));
    }
}
