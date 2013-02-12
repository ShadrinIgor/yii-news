    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="ru" />
    <title><?= Yii::app()->page->title; ?></title>

    <link rel="icon" href="<?php echo $Theme->getBaseUrl() ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $Theme->getBaseUrl() ?>/images/ico.ico" />

    <meta name="Keywords" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес, Политика
Технологии, интернет, игры,Шоубиз, Экономика, Общество, Культура, Спорт, Авто/Мото, Разное, Происшествия, Здоровье, Туризм, Музыка, Кино
Личные деньги, Курьезы" />
    <meta name="Description" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес"/>
    <base href="<?= Yii::app()->params["baseUrl"] ?>" />

    <?php

        $cs=Yii::app()->clientScript;
        $cs->coreScriptPosition=CClientScript::POS_HEAD;
        $cs->scriptMap=array();
        $baseUrl=$Theme->getBaseUrl();
        $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.js');
        $cs->registerScriptFile($baseUrl.'/js/functions.js');
        $cs->registerScriptFile($baseUrl.'/js/lightbox/lightbox.js');

        $cs->registerCssFile($baseUrl.'/css/style.css');
        $cs->registerCssFile($baseUrl.'/css/b_style.css');
        $cs->registerCssFile($baseUrl.'/js/lightbox/lightbox.css');

    ?>

    <meta http-equiv="Cache-Control" content="public"/>
    <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate"/>