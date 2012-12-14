<div id="PageText">
    <?php
    $this->widget('addressLineWidget', array(
        'links'=>$links,
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

    <h1><?= $pageTitle ?></h1>

    <?php foreach( $peoples as $values ) : ?>
        <div class="cItem listItems">
            <a title="<?= SiteHelper::getStringForTitle( $values->name  )?>" href="<?= SiteHelper::createUrl("people/", array("slug"=>$values->key_word, "action"=>"desc" )) ?>"><?= $values->name ?></a>
            <div class="TN_img"><div class="count_shows">Просмотров <?= $values->col ?></div><img alt="<?= SiteHelper::getStringForTitle( $values->name  ) ?>" title="<?= SiteHelper::getStringForTitle( $values->name ); ?>" src="<?= ImageHelper::getImage( $values->image, 2, $values ) ?>" /></div>
            <?php if( $values->country->id>0 ) : ?><a class="newsCid" title="<?= SiteHelper::getStringForTitle( $values->country->name .", ". $values->cid_id->name ) ?>" href="<?= SiteHelper::createUrl( "category/", array( "slug" =>$values->cid_id->key_word, "country"=>$values->country->key_word2 ) ) ?>"><?= $values->country->name ?></a>,<?php endif; ?>
            <a class="newsCid" title="<?= SiteHelper::getStringForTitle( $values->cid_id->name .",". $values->country->name ) ?>" href="<?= SiteHelper::createUrl("category/", array( "slug"=>$values->cid_id->key_word ) ) ?>"><?= $values->cid_id->name ?></a><br/>
            <?= SiteHelper::getSubTextOnWorld( $values->description, 200 ) ?>

            <div class="moreLink"><a title="подробнее" href="<?= SiteHelper::createUrl("people/", array( "slug"=>$values->key_word )) ?>">подробнее ...</a></div>
        </div>
    <?php endforeach; ?>

    <?php $this->widget( 'paginatorWidget', array
(
    "count"   => $count,
    "offset"  => $offset,
    "page"    => $page,
    "url"     => array( "people/", $paginatorLinks )
) );
    ?>
</div>