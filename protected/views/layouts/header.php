    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="ru" />
    <title><?= Yii::app()->page->title; ?></title>

    <link rel="icon" href="<?php echo $Theme->getBaseUrl() ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $Theme->getBaseUrl() ?>/images/ico.ico" />

    <meta name="Keywords" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес, Политика
Технологии, интернет, игры,Шоубиз, Экономика, Общество, Культура, Спорт, Авто/Мото, Разное, Происшествия, Здоровье, Туризм, Музыка, Кино
Личные деньги, Курьезы" />
    <meta name="Description" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес"/>
    <base href="<?= Yii::app()->params["baseUrl"] ?>1" />

    <link href="<?php echo $Theme->getBaseUrl() ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Theme->getBaseUrl() ?>/css/b_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Theme->getBaseUrl() ?>/js/lightbox/lightbox.css" rel="stylesheet" type="text/css" />

    <?php

        $cs=Yii::app()->clientScript;
        $cs->coreScriptPosition=CClientScript::POS_HEAD;
        $cs->scriptMap=array();
        $baseUrl= Yii::app()->assetManager->basePath;
        $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.easing.1.3.js');
        $cs->registerScriptFile($baseUrl.'/js/functions.js');
        $cs->registerScriptFile($baseUrl.'/js/lightbox/lightbox.js');

//        $cs->registerCssFile($baseUrl.'/js/functions.js');

    ?>
    <!--script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/jquery/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/functions.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/lightbox/lightbox.js"></script-->

    <meta http-equiv="Cache-Control" content="public"/>
    <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate"/>
