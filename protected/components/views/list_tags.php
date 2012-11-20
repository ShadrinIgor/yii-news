<?php if( sizeof( $listTags )>0 ) : ?>
    <div class="newsTags">
        <?php
            $i=0;
            foreach( $listTags as $tag ) :
                if( $i>0 )echo ", ";
                $i++;
            ?>
            <a href="<?= SiteHelper::createUrl( "tag/", array( "slug"=>$tag->name ) ) ?>" title="<?= $tag->tag_id->name ?>"><?= $tag->tag_id->name ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>