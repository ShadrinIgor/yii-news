<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class menuWidget extends CWidget
{
    public $controller;
    public function run()
    {
        $listNews = CatalogCid::fetchAll( DBQueryParamsClass::CreateParams()->setLimit( -1 ) );

        $curlManager = new CUrlManager();
        $this->render("menu", array(
                    'curlManager' => $curlManager,
                    'listNews'    => $listNews
            ));
    }
}
