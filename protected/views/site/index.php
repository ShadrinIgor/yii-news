<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1>Urra</h1>
<?php $this->widget ( 'errorsWidget', array( "errors"=>$errors ) ); ?>
<?php
foreach( CatalogNews::fetchAll() as $values )
{
    $this->widget('newsWidget', array(
        'values'=>$values,
        'controller'=> $controller
    ));
}
