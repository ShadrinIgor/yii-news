<?php foreach( $listNews as $values ) : ?>
    <div><a href="<?= $curlManager->createUrl("category/", array( "id"=>$values->id, "country"=>0, "slug"=>$values->key_word )) ?>" title="<?= $values->name; ?> : Мировые новости, новости Узбекистана"><?= $values->name; ?></a></div>
    <div class="M_sep"></div>
<?php endforeach; ?>