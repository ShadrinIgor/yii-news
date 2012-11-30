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
        <a title="мировые Новости недели, последние новости" href="<?= SiteHelper::createUrl( "week/" ) ?>"">Новости недели</a>
        <a title="теги новостей" href="<?= SiteHelper::createUrl( "tag/list" ) ?>">Теги</a>

    </div>

    <?php $this->widget ( 'menuWidget', array( "controller"=>$controller ) ); ?>
</div>
