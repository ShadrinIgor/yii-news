<div id="PageText">
    <?php
    $this->widget('addressLineWidget', array(
        'links'=>array(

                    $tag->name,
            ),
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

<h1><?= $tag->name ?></h1>
<?php
$offset = 10;


/*
$listRelation = CatNewsTagsRelation::fetchAll(
DBQueryParamsClass::CreateParams()
            ->setConditions( "tag_id=:tag_id" )
            ->setParams( array(":tag_id"=>$tag->tag_id->id) )
            ->setLimit( $offset )
            ->setPage( ( $page-1 )*$offset )
);


$countNews = CatNewsTagsRelation::count(
DBQueryParamsClass::CreateParams()
    ->setConditions( "tag_id=:tag_id" )
    ->setParams( array(":tag_id"=>$tag->tag_id->id) )
);
*/


foreach( $tag->catNewsTagsRelations as $relation )
{
    $this->widget('newsWidget', array(
    'values'=>$relation->news_id
    ));
}
?>

<?php
if( !empty( $_GET["slug"] ) )$urlParams = array( "slug"=>$_GET["slug"] );
if( !empty( $_GET["id"] ) )$urlParams = array_merge( $urlParams, array( "id"=>$_GET["id"]  ));

$this->widget( 'paginatorWidget', array
(
    "count"   => 5,
    "offset"  => 10,
    "page"    => 1,
    "url"     => array( "tag/", $urlParams )
) );
?>
</div>