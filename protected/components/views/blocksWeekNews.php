<?php

    $curent = date( "w" )-1;
    $startDate = time() - $curent*3600*24;
    $conditions="date>:date AND date<:date2";
    $params = array( ":date"=>date("Y-m-d", $startDate), ":date2"=>date("Y-m-d") );

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
