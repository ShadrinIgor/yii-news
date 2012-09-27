<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="ru" />
    <title>-Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана</title>

    <link rel="icon" href="<?php echo $Theme->getBaseUrl() ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $Theme->getBaseUrl() ?>/images/ico.ico" />

    <meta name="Keywords" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес, Политика
Технологии, интернет, игры,Шоубиз, Экономика, Общество, Культура, Спорт, Авто/Мото, Разное, Происшествия, Здоровье, Туризм, Музыка, Кино
Личные деньги, Курьезы" />
    <meta name="Description" content="Новости Узбекистана, политика, экономика, шоубизнес - Мировые новости, новости Узбекистана.Новости Узбекистана, политика, экономика, шоубизнес"/>
    <base href="<?= Yii::app()->params["bathUrl"] ?>" />

    <link href="<?php echo $Theme->getBaseUrl() ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Theme->getBaseUrl() ?>/css/b_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Theme->getBaseUrl() ?>/js/lightbox/lightbox.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/jquery/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/functions.js"></script>
    <script type="text/javascript" src="<?php echo $Theme->getBaseUrl() ?>/js/lightbox/lightbox.js"></script>

    <meta http-equiv="Cache-Control" content="public"/>
    <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate"/>

    <link href="<?php echo $Theme->getBaseUrl() ?>/css/style_new.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- facebook like -->
<div id="fb-root"></div>
<!-- end of facebook like -->

<div id="BMain" class="noBackground">
    <div id="Main">
        <div id="Mcenter">
            <div id="Top">
                <div id="Find">
                    <form method="post" action="http://www.world-news.uz/find/">
                        <input type="text" name="find" value="поиск..." class="inputBorder" /><input type="image" class="inputImg" src="<?= $Theme->getBaseUrl() ?>/images/find.png" />
                    </form>
                </div>
                <!-- facebook like
                 коментриую пока facebook чтобы не грузил
                <div class="fb-like-box"><script src="http://connect.facebook.net/ru_RU/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/pages/%D0%9C%D0%B8%D1%80%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8/291777874190780" width="99" layout="box_count" show_faces="false" font="lucida grande"></fb:like></div>
                 end of facebook like -->
                <a href="http://www.world-news.uz/" title="мировые новости, новости узбекистана, последние новости политика, шоубиснес" ><img src="<?= $Theme->getBaseUrl() ?>/images/logo.jpg" title="мировые новости, новости узбекистана, последние новости политика, шоубиснес" alt="мировые новости, новости узбекистана, последние новости политика, шоубиснес" /></a>
                <div id="TInfo">
                    <div id="TI01">ТАШКЕНТ</div>

                    <div id="TI03">
                        <a href="http://www.world-news.uz/" id="TI_home" title="Главная страница мировых новостей"></a>
                        <a href="http://www.world-news.uz/contact/" id="TI_contact" title="Контакты"></a>
                        <a href="http://www.world-news.uz/map/" id="TI_map" title="Карта сайта"></a>
                    </div>
                    <div id="TI02">Среда 19 Сентября</div>
                </div>
            </div>
            <div id="Menu">
                <div class="MSel">
                    <a title="мировые Новости недели, последние новости" href="http://world-news.uz/news_week/">Новости недели</a>
                </div>

<?php foreach( CatalogCid::fetchAll() as $values ) : ?>
                <div><a href="<?= $this->createUrl("category/", array( "id"=>$values->id, "country"=>0, "slug"=>$values->key_word )) ?>" title="<?= $values->name; ?> : Мировые новости, новости Узбекистана"><?= $values->name; ?></a></div>
                <div class="M_sep"></div>
<?php endforeach; ?>
<!--
                <div><a  href="http://www.world-news.uz/category/6/0/politika" title="Политика : Мировые новости, новости Узбекистана">Политика</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/8/0/tehnology_science_games" title="Наука, технологии, образование : Мировые новости, новости Узбекистана">Наука, технологии, образование</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/9/0/shoubiz" title="Шоубиз : Мировые новости, новости Узбекистана">Шоубиз</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/14/0/ekonomika" title="Экономика : Мировые новости, новости Узбекистана">Экономика</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/15/0/obshestvo" title="Общество : Мировые новости, новости Узбекистана">Общество</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/18/0/kultura" title="Культура : Мировые новости, новости Узбекистана">Культура</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/19/0/sport" title="Спорт : Мировые новости, новости Узбекистана">Спорт</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/21/0/avto_moto" title="Авто/Мото : Мировые новости, новости Узбекистана">Авто/Мото</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/33/0/proizshestvie" title="Происшествия : Мировые новости, новости Узбекистана">Происшествия</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/34/0/zdorove" title="Здоровье : Мировые новости, новости Узбекистана">Здоровье</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/36/0/tourizm" title="Туризм : Мировые новости, новости Узбекистана">Туризм</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/39/0/muzika" title="Музыка : Мировые новости, новости Узбекистана">Музыка</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/40/0/kino" title="Кино : Мировые новости, новости Узбекистана">Кино</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/41/0/lichnie_dengi" title="Личные деньги : Мировые новости, новости Узбекистана">Личные деньги</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/43/0/kurezi" title="Курьезы : Мировые новости, новости Узбекистана">Курьезы</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/44/0/" title="Выставки, показы : Мировые новости, новости Узбекистана">Выставки, показы</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/45/0/" title="Тусовка : Мировые новости, новости Узбекистана">Тусовка</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/48/0/" title="Фотогалерея : Мировые новости, новости Узбекистана">Фотогалерея</a></div>
                <div class="M_sep"></div>

                <div><a  href="http://www.world-news.uz/category/49/0/" title="Калейдоскоп : Мировые новости, новости Узбекистана">Калейдоскоп</a></div>
                <div class="M_sep"></div>
-->
            </div>

        </div>
        <div id="MLeft">
            <?php echo $content; ?>
        </div>
    </div>
    <div id="MBottom">
        <div id="bottomMenu">
            <div id="right">При копировании или использовании материалов сайта ссылка <a href="http://www.world-news.uz/" title="Мировые новости, Новости Узбекистана">Мировые новости</a> обязательна. </div>
            <div class="BM_block">
                <div class="BML_title">О проекте</div>
                <ul>
                    <li><a href="http://www.world-news.uz/contact/" title="контакты">контакты</a></li>
                    <li><a href="http://www.world-news.uz/investment/" title="финансовым партнерам">финансовым партнерам</a></li>
                    <li><a href="http://www.world-news.uz/partnership/" title="информационным партнерам">информационным партнерам</a></li>
                    <li><a href="http://www.world-news.uz/map/" title="карта сайа">карта сайта</a></li>
                    <li><a href="http://www.world-news.uz/links/" title="ссылки">ссылки</a></li>
                </ul>
            </div>
            <div class="BM_block">
                <div class="BML_title">Мировые новости</div>
                <ul>
                    <li><a href="http://www.world-news.uz/category/6/world_politika" title="мировая политика">политика</a></li>
                    <li><a href="http://www.world-news.uz/category/9/world_shoubiz" title="мировой шоубиз">шоубиз</a></li>
                    <li><a href="http://www.world-news.uz/category/36/world_tourizm" title="мировой туризм">туризм</a></li>
                    <li><a href="http://www.world-news.uz/category/33/world_proizshestvie" title="происшествия в мире">происшествия</a></li>
                    <li><a href="http://www.world-news.uz/ategory/8/tehnology" title="мировые технологии">технологии</a></li>
                </ul>
            </div>
            <div class="BM_block">

                <div class="BML_title">Новости Узбекистана</div>
                <ul>
                    <li><a href="http://www.world-news.uz/category/14/usbekistan_ekonomika" title="экономика Узбекистана">экономика</a></li>
                    <li><a href="http://www.world-news.uz/category/15/usbekistan_obshestvo" title="общество Узбекистана">общество</a></li>
                    <li><a href="http://www.world-news.uz/category/6/usbekistan_politika" title="политика Узбекистана">политика</a></li>
                    <li><a href="http://www.world-news.uz/category/19/usbekistan_sport" title="спорт Узбекистана">спорт</a></li>
                </ul>
            </div>


            <div class="BM_block BM_contact">
                <br/>
                +9 ( 9897 ) 780-02-60<br/>+9 ( 9897 ) 455-93-58<br/>
                mail@trio.uz<br/>
                <br/>
                Студия нового !!!<br/>
                <a href="http://www.trio.uz" title="Студия создания сайтов">TRIO.uz</a><br/>
            </div>
            <div id="counters">

                <!-- Yandex.Metrika informer -->
                <a href="http://metrika.yandex.ru/stat/?id=11298340&from=informer"
                   target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/11298340/3_0_FFFFFCFF_F5F5DCFF_0_pageviews"
                                                       style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:11298340,type:0,lang:'ru'});return false}catch(e){}"/></a>
                <!-- /Yandex.Metrika informer -->

                <!-- Yandex.Metrika counter -->
                <div style="display:none;"><script type="text/javascript">
                    (function(w, c) {
                        (w[c] = w[c] || []).push(function() {
                            try {
                                w.yaCounter11298340 = new Ya.Metrika({id:11298340, enableAll: true});
                            }
                            catch(e) { }
                        });
                    })(window, "yandex_metrika_callbacks");
                </script></div>
                <script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
                <noscript><div><img src="//mc.yandex.ru/watch/11298340" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                <!-- /Yandex.Metrika counter -->

                <!-- START WWW.UZ TOP-RATING --><SCRIPT language="javascript" type="text/javascript">
                <!--
                top_js="1.0";top_r="id=26579&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
                //-->
            </SCRIPT>
                <SCRIPT language="javascript1.1" type="text/javascript">
                    <!--
                    top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
                    //-->
                </SCRIPT>
                <SCRIPT language="javascript1.2" type="text/javascript">
                    <!--
                    top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
                            (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
                    //-->
                </SCRIPT>
                <SCRIPT language="javascript1.3" type="text/javascript">
                    <!--
                    top_js="1.3";
                    //-->
                </SCRIPT>
                <SCRIPT language="JavaScript" type="text/javascript">
                    <!--
                    top_rat="&col=E6CC85&t=000000&p=F5F2DF";top_r+="&js="+top_js+"";document.write('<a href="http://www.uz/rus/toprating/cmd/stat/id/26579" target=_top><img src="http://www.uz/plugins/top_rating/count/cnt.png?'+top_r+top_rat+'" width=88 height=31 border=0 alt="Топ рейтинг www.uz"></a>')//-->
                </SCRIPT><NOSCRIPT><A href="http://www.uz/rus/toprating/cmd/stat/id/26579" target=_top><IMG height=31 src="http://www.uz/plugins/top_rating/count/nojs_cnt.png?id=26579&col=E6CC85&t=000000&p=F5F2DF" width=88 border=0 alt="Топ рейтинг www.uz"></A></NOSCRIPT><!-- END WWW.UZ TOP-RATING -->


            </div>
        </div>

    </div>
    <div id="TNet">
        <div id="TLogo"></div>
        <div class="TBan"><div class="RB RBSmiles"><a href="http://www.smiles.uz" title="Юмористические портал смешные новости, фото и видео приколы, карикатуры, демотиваторы :: Юмористические портал - Smilesт"></a></div></div>
        <div class="TBan"><div class="RB RBWorldTravel"><a href="http://www.world-travel.uz" title="Мировой туризм специально для Вас - Малазия, Турция, Сочи, АОЭ"></a></div></div>
        <div class="TBan"><div class="RB RBTrio"><a href="http://www.trio.uz" title="Студия нового"></a></div></div>
    </div>
</div>
</body>
<?php /* @var $this Controller

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

 * /
 -->
 */ ?>