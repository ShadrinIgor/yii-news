<?php if( sizeof( $listTags )>0 ) : ?>
    <div class="newsTags">
        <?php
            $i=0;
            foreach( $listTags as $tag ) :
                if( $i>0 )echo ", ";
                $i++;
            ?>
            <?= CHtml::link( $tag->tag_id->name, SiteHelper::createUrl( "tag/", array( "slug"=> SiteHelper::checkedSlugName( $tag->name ), "id"=>$tag->id) ), array( "title"=>$tag->tag_id->name )  ); ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>