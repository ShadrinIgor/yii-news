<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class menuWidget extends Widget
{
    public $controller;
    public function run()
    {
        $this->render("menu", array());
    }
}
