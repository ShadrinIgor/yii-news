<?php foreach( $links as $key=>$link ) : ?>
    <?php if( !empty( $link ) ) : ?>
        <a href="<?= SiteHelper::createUrl( $link[0], array( $link[1]  ) ) ?>" title="<?= $key ?>"><?= $key." - ". $link[0]." - ".$link[1] ?></a>
        <span>... </span>
    <?php endif; ?>
    <?php if( empty( $link ) ) : ?>
        <span><?= $key ?></span>
    <?php endif; ?>
<?php endforeach; ?>