<?php

class UserModule extends CWebModule
{
    public function init()
    {
        Yii::import("modules.user.models.*");
    }
}