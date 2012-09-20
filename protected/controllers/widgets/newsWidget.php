<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * To change this template use File | Settings | File Templates.
 */
class newsWidget extends CWidget
{
    public function actionIndex()
    {
        $this->render("index");
    }
}
