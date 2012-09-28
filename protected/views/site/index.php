<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1>Urra</h1>

<?php
foreach( CatalogNews::fetchAll() as $values )
{
    $this->widget('newsWidget', array(
        'values'=>$values,
        'url'=> $controller->createurl( "news/", array( "id"=>$values->id, "slug"=>$values->key_word ) )
    ));
}
