<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class addressLineWidget extends CWidget
{
    public $links;
    public function run()
    {
        $this->render("address", array(
            "links" => $this->links
        ));
    }
}
