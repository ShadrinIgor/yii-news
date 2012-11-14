<h1><?= $category->name ?></h1>
<?php

$listNews = CatalogNews::fetchAll(
    DBQueryParamsClass::CreateParams()
        ->setConditions("cid_id=:cid_id")
        ->setParams( array(":cid_id" => $category->id ) )
        ->setLimit(10)
);
foreach( $listNews as $values )
{
    $this->widget('newsWidget', array(
    'values'=>$values
    ));
}
