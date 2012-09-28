<?php foreach( $listNews as $values ) : ?>
    <div><a href="<?= $controller->createUrl("category/", array( "slug"=>$values->key_word )) ?>" title="<?= $values->name; ?> : Мировые новости, новости Узбекистана"><?= $values->name; ?></a></div>
    <div class="M_sep"></div>
<?php endforeach; ?>