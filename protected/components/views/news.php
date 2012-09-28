<div class="cItem listItems">
    <a title="<?= $values->name ?> - Узбекистан Шоубиз" href="<?= $url ?>"><?= $values->name ?></a>
    <div class="TN_img"><div class="count_shows">Просмотров <?= $values->col ?></div><img alt="<?= $values->name ?> - Шоубиз Узбекистан" title="<?= $values->name ?> - Шоубиз Узбекистан" src="f/catalog_news/2012/9/3_17923koncert.jpg"></div>

    <font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y", "news ID: ".$values->id ) ?></font><br>
    <a class="newsCid" title="<?= $values->country->name ?>, <?= $values->cid_id->name ?>" href="http://www.world-news.uz/category/9/1/"><?= $values->country->name ?></a>,
    <a class="newsCid" title="<?= $values->cid_id->name ?>,<?= $values->country->name ?>" href="http://www.world-news.uz/category/9/"><?= $values->cid_id->name ?></a><br>

    <?= SiteHelper::getSubTextOnWorld( $values->description, 200 ) ?>

    <div class="moreLink"><a title="подробнее" href="<?= $url ?>">подробнее ...</a></div>
</div>