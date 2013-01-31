<?php
    $num = $params["num"];
    $imageClass = "";
    if( $num<=3 )
    {
        $class = "firstNew1";
        $imageClass = "firstNewsBigImage";
    }
        elseif( $num<8 )
        {
            $class="firstNew2";
            $imageClass = "firstNewsLittleImage";
        }
            else $class="firstNew3";
?>

<div class="cItem listItems <?= $class ?>">
    <?php if( $num<8 ) : ?>
        <div class="TN_img<?= " ".$imageClass ?>"><div class="count_shows">Просмотров <?= $values->col ?></div><img alt="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->cid_id->name ." ". $values->country->name ) ?>" title="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->cid_id->name ." ". $values->country->name ); ?>" src="<?= ImageHelper::getImage( $values->image, 2, $values ) ?>" /></div>
    <?php endif; ?>
    <a title="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->country->name ." ". $values->cid_id->name )?>" href="<?= $url ?>"><?= $values->name ?></a>
    <?php if( $num<8 ) : ?>
        <font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y", "news ID: ".$values->id ) ?></font><br/>
        <?php if( $values->country->id>0 ) : ?><a class="newsCid" title="<?= SiteHelper::getStringForTitle( $values->country->name .", ". $values->cid_id->name ) ?>" href="<?= SiteHelper::createUrl( "category/", array( "slug" =>$values->cid_id->key_word, "country"=>$values->country->key_word2 ) ) ?>"><?= $values->country->name ?></a>,<?php endif; ?>
        <a class="newsCid" title="<?= SiteHelper::getStringForTitle( $values->cid_id->name .",". $values->country->name ) ?>" href="<?= SiteHelper::createUrl("category/", array( "slug"=>$values->cid_id->key_word ) ) ?>"><?= $values->cid_id->name ?></a><br/>
    <?php endif; ?>

    <!-- ?= SiteHelper::getSubTextOnWorld( $values->description, 200 ) -->
    <!-- div class="moreLink"><a title="подробнее" href="<?= $url ?>">подробнее ...</a></div-->
</div>
