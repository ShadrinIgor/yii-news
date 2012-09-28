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
    public $url;
    public function run()
    {
        $this->render("news", array(
                    'values'=>$this->values,
                    'url'   =>$this->url
            ));
    }
}
