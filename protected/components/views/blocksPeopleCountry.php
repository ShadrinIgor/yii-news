<?php
    $conditions="date=:date";
    $params = array( ":date"=>date("Y-m-d") );

    $listCategory = DBQueryParamsClass::CreateParams()
        ->setConditions( "exists( SELECT id FROM catalog_people WHERE country = catalog_country_as.id )" )
        ->setOrderBy("name")
        ->setLimit( -1 );

    $cout = "";
    foreach( CatalogCountry::fetchAll( $listCategory ) as $values )
    {
        $cout .= "<li>".CHtml::link( $values->name, SiteHelper::createUrl( "people/", array( "country"=> $values->key_word ) ), array("title"=>$values->name) )."</li>";
    }
?>
<?php if( !empty( $cout ) ) : ?>
    <div class="ML_block">
        <div class="BML_title">Страны</div>
        <ul>
            <?= $cout ?>
        </ul>
    </div>
<?php endif; ?>