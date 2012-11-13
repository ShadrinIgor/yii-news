<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1>Urra</h1>
<?php
foreach( CatalogNews::fetchAll( DBQueryParamsClass::CreateParams()->setLimit(10), array( "catalog_country", "catalog_cid" )) as $values )
{
    $this->widget('newsWidget', array(
        'values'=>$values
    ));
}
