<?php
if( $page >1 || $this->beginCache( "category_".$category->id."_".$page, array('duration'=>3600) ) ) :
?>

<div id="PageText">
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>
<h1><?= $category->name ?></h1>
<?php

$listNews = CatalogNews::fetchAll(
    DBQueryParamsClass::CreateParams()
        ->setConditions("cid_id=:cid_id")
        ->setParams( array(":cid_id" => $category->id ) )
        ->setLimit(10)
        ->setPage( ( $page-1 )*10 )
);
foreach( $listNews as $values )
{
    $this->widget('newsWidget', array(
    'values'=>$values
    ));
}
?>
</div>

<?php
if( $page ==1 )$this->endCache();
endif;
?>