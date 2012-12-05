<li>
    <div class="oneNews">
        <div class="ON_name"><a title="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->country->name ." ". $values->cid_id->name )?>" href="<?= $url ?>"><?= $values->name ?></a></div>
        <font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y", "news ID: ".$values->id ) ?></font><br />
        <?php if( $values->country->id>0 ) : ?><a class="newsCid" title="<?= SiteHelper::getStringForTitle( $values->country->name .", ". $values->cid_id->name ) ?>" href="<?= SiteHelper::createUrl( "category/", array( "slug" =>$values->cid_id->key_word, "country"=>$values->country->key_word2 ) ) ?>"><?= $values->country->name ?></a><br/><br /><?php endif; ?>
        <div class="TN_img"><div class="count_shows">Просмотров <?= $values->col ?></div><img alt="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->cid_id->name ." ". $values->country->name ) ?>" title="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->cid_id->name ." ". $values->country->name ); ?>" src="<?= ImageHelper::getImage( $values->image, 2, $values ) ?>" /></div>

        <div class="popup" style="display:none;">
            <a title="<?= SiteHelper::getStringForTitle( $values->name ." - ". $values->country->name ." ". $values->cid_id->name )?>" href="<?= $url ?>"><?= $values->name ?></a><br/>
            <?= SiteHelper::getSubTextOnWorld( $values->description, 600 ) ?>
        </div>
    </div>
</li>
