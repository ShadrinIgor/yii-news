<?php
    $conditions="date=:date";
    $params = array( ":date"=>date("Y-m-d") );

    $listCategory = DBQueryParamsClass::CreateParams()
        ->setConditions( "exists( SELECT id FROM catalog_people WHERE cid_id = catalog_people_cid_as.id )" )
        ->setOrderBy("name DESC")
        ->setLimit( -1 );

    $cout = "";
    foreach( CatalogPeopleCid::fetchAll( $listCategory ) as $values )
    {
        $cout .= "<li>".CHtml::link( $values->name, SiteHelper::createUrl( "people/", array( "category"=> $values->key_word ) ), array("title"=>$values->name) )."</li>";
    }
?>
<?php if( !empty( $cout ) ) : ?>
    <div class="ML_block">
        <div class="BML_title">Категории</div>
        <ul>
            <?= $cout ?>
        </ul>
    </div>
<?php endif; ?>