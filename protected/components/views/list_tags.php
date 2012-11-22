<?php if( sizeof( $listTags )>0 ) : ?>
    <div class="newsTags">
        <?php
            $i=0;
            foreach( $listTags as $tag ) :
                if( $i>0 )echo ", ";
                $i++;
            ?>
            <?= CCHtml::link( $tag->tag_id->name, SiteHelper::createUrl( "tag/", array( "slug"=>$tag->name ) ), array( "title"=>$tag->tag_id->name ) ); ?>
            <a href="<?= SiteHelper::createUrl( "tag/", array( "slug"=>$tag->name ) ) ?>" title="<?= $tag->tag_id->name ?>"><?= $tag->tag_id->name ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>