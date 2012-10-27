<div id="fotoNews">
    <h3>Анонсы</h3>
    <div class="FNBloks">
        <?php foreach( $listNewsFoto as $values ) :
            $countryTitle = $values->country->name;
            $cid = $values->cid_id->name;
            $title = "";
        ?>
            <div class="FN_item">
                <div class="FNImage"><img src="<?= $values->image ?>" title="<?= $title." - ".$countryTitle.",".$cid ?>" alt="<?= $cid.",". $title." - ".$countryTitle ?>" /></div>
                <div class="FN_text">
                    <a href="<?= SiteHelper::createUrl("news/", array( "slug"=>$values->key_word, "id"=>$values->id )) ?>" title="<?= $title." - ".$countryTitle.",".$cid ?>"><?= $values->name ?></a>&nbsp;&nbsp;&nbsp;<font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y" )  ?></font><br/>

                    <?php if( $values->country->id > 0 ) : ?><a href="<?= SiteHelper::createUrl("category/", array( "country"=>$values->country->key_word, "slug"=>$values->cid_id->key_word, "id"=>$values->country->id )) ?>" title="<?= $countryTitle.",".$cid ?>" class="newsCid"><?= $values->country->name ?></a>,<?php endif; ?>
                    <a href="<?= SiteHelper::createUrl("category/", array( "slug"=>$values->cid_id->key_word, "id"=>$values->country->id )) ?>" title="<?= $cid.",".$countryTitle ?>" class="newsCid"><?= $values->cid_id->name ?></a><br />
                    <?= SiteHelper::getSubTextOnWorld( $values->description, 700 ) ?>
                    <div class="moreLink"><a href="<?= SiteHelper::createUrl("news/", array( "slug"=>$values->key_word, "id"=>$values->id )) ?>" title="подробнее">подробнее ...</a></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--
     <div class="FNBloks">
     <h3>Новости Узбекистана</h3>
       <com_getCidItems( 230, "news", 10, "archive=0 AND image!='' AND `date`<=$sqlNow AND country=1", $order ):foto_news_template>
     </div>
    -->
     <h3>Мировые новости</h3>
     <div class="FNBloks">
         <?php foreach( $listFoto as $values ) :
         $countryTitle = $values->country->name;
         $cid = $values->cid_id->name;
         $title = "";
         ?>
         <div class="FN_item">
             <div class="FNImage"><img src="<?= $values->image ?>" title="<?= $title." - ".$countryTitle.",".$cid ?>" alt="<?= $cid.",". $title." - ".$countryTitle ?>" /></div>
             <div class="FN_text">
                 <a href="<?= SiteHelper::createUrl("news/", array( "slug"=>$values->key_word, "id"=>$values->id )) ?>" title="<?= $title." - ".$countryTitle.",".$cid ?>"><?= $values->name ?></a>&nbsp;&nbsp;&nbsp;<font><?= SiteHelper::getDateOnFormat( $values->date, "d.m.Y" )  ?></font><br/>

                 <?php if( $values->country->id > 0 ) : ?><a href="<?= SiteHelper::createUrl("category/", array( "country"=>$values->country->key_word, "slug"=>$values->cid_id->key_word, "id"=>$values->country->id )) ?>" title="<?= $countryTitle.",".$cid ?>" class="newsCid"><?= $values->country->name ?></a>,<?php endif; ?>
                 <a href="<?= SiteHelper::createUrl("category/", array( "slug"=>$values->cid_id->key_word, "id"=>$values->country->id )) ?>" title="<?= $cid.",".$countryTitle ?>" class="newsCid"><?= $values->cid_id->name ?></a><br />
                 <?= SiteHelper::getSubTextOnWorld( $values->description, 700 ) ?>
                 <div class="moreLink"><a href="<?= SiteHelper::createUrl("news/", array( "slug"=>$values->key_word, "id"=>$values->id )) ?>" title="подробнее">подробнее ...</a></div>
             </div>
         </div>
         <?php endforeach; ?>
     </div>
</div>