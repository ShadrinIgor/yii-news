<?php
    $conditions="date=:date";
    $params = array( ":date"=>date("Y-m-d") );

    $listNews = CatalogNews::fetchAll(
    DBQueryParamsClass::CreateParams()
        ->setConditions( $conditions )
        ->setParams( $params )
        ->setOrderBy("col DESC")
        ->setLimit( 6 )
    , array( "catalog_country", "catalog_cid" ));

    foreach( $listNews as $values )
    {
        $this->widget('newsWidget', array(
                            'values'=>$values
                    ));
    }
