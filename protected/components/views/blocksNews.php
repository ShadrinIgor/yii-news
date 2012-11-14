<?php
    $listNews = CatalogNews::fetchAll(
    DBQueryParamsClass::CreateParams()
        ->setOrderBy("col DESC")
        ->setLimit( 6 )
    , array( "catalog_country", "catalog_cid" ));

    foreach( $listNews as $values )
    {
        $this->widget('newsWidget', array(
                                        'values'=>$values
                    ));
    }
