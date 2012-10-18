<div class="cItem listItems">
    <a title="<?= $values->name ?> - <?= $values->country->name ?> <?= $values->cid_id->name ?>" href="<?= $url ?>"><?= $values->name ?></a>
    <div class="TN_img"><div class="count_shows">Просмотров <?= $values->col ?></div><img alt="<?= $values->name ?> - <?= $values->cid_id->name ?> <?= $values->country->name ?>" title="<?= $values->name ?> - <?= $values->cid_id->name ?> <?= $values->country->name ?>" src="<?= ImageHelper::getImage( $values->image, 2, $values ) ?>"></div>

    <font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y", "news ID: ".$values->id ) ?></font><br>
    <?php if( $values->country->id>0 ) : ?><a class="newsCid" title="<?= $values->country->name ?>, <?= $values->cid_id->name ?>" href="<?= $controller->createUrl( "category/", array( "country" =>$values->cid_id->key_word, "slug"=>$values->country->key_word ) ) ?>"><?= $values->country->name ?></a>,<?php endif; ?>
    <a class="newsCid" title="<?= $values->cid_id->name ?>,<?= $values->country->name ?>" href="<?= $controller->createUrl( "category/", array( "slug"=>$values->cid_id->key_word ) ) ?>"><?= $values->cid_id->name ?></a><br>

    <?= SiteHelper::getSubTextOnWorld( $values->description, 200 ) ?>

    <div class="moreLink"><a title="подробнее" href="<?= $url ?>">подробнее ...</a></div>
</div>