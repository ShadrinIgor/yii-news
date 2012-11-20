<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class tagsWidget extends CWidget
{
    public $listTags;
    public function run()
    {
        $this->render("list_tags", array(
                        'listTags'      => $this->listTags
            ));
    }
}
