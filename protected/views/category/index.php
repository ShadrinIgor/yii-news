<?php
//if( $page >1 || $this->beginCache( "category_".$category->id."_".$page, array('duration'=>3600) ) ) :
?>

<div id="PageText">
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>
<h1><?php
    echo sizeof( $category )>0 ? $category[0]->name : "";
    if( sizeof( $country )>0 )
        if( sizeof( $category )>0 )echo " ". $country[0]->name2;
            else echo $country[0]->name;
    ?></h1>
<?php

if( sizeof( $category )>0 )
{
    $conditions = "cid_id=:cid_id";
    $params = array( ":cid_id" => $category[0]->id );
}

if( sizeof( $country )>0 )
{
    if( !empty( $conditions ) )
    {
        $conditions.=" AND country=:country";
        $params = array_merge( $params, array( ":country" => $country[0]->id ) );
    }
        else
    {
        $params = array( ":country" => $country[0]->id );
        $conditions = "country=:country";
    }
}


$offset = 10;
$listNews = CatalogNews::fetchAll(
    DBQueryParamsClass::CreateParams()
        ->setConditions( $conditions )
        ->setParams( $params )
        ->setLimit( $offset )
        ->setPage( ( $page-1 )*$offset )
);

$countNews = CatalogNews::count(
    DBQueryParamsClass::CreateParams()
        ->setConditions( $conditions )
        ->setParams( $params )
);
foreach( $listNews as $values )
{
    $this->widget('newsWidget', array(
    'values'=>$values
    ));
}
?>

<?php
if( !empty( $_GET["slug"] ) )$urlParams = array( "slug"=>$_GET["slug"] );
if( !empty( $_GET["country"] ) )$urlParams = array_merge( $urlParams, array( "country"=>$_GET["country"]  ));

$this->widget( 'paginatorWidget', array
(
    "count"   => $countNews,
    "offset"  => $offset,
    "page"    => $page,
    "url"     => array( "category/", $urlParams )
) );
?>

</div>

<?php
//if( $page ==1 )$this->endCache();
//endif;
?>