<div id="PageText">
    <?php
        $this->widget('addressLineWidget', array(
            'links'=>$links,
        ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

<h1><?php
    echo sizeof( $category )>0 ? $category[0]->name : "";
    if( sizeof( $country )>0 )
        if( sizeof( $category )>0 )echo " ". $country[0]->name2;
            else echo $country[0]->name;
    ?></h1>

<?php if( sizeof( $afishi ) >0  ) : ?>
    <h2>Афиши и анонсы</h2>
    <div class="topListNews cidListNews">
        <div class="leftSlide prevStory03$num"></div>
        <div class="newsBlock03" id="newsBlock$num">
            <ul>
                <?php foreach( $afishi as $afisha ):
                    $this->widget( "newsWidget", array( "values"=>$afisha,"view"=>"newsCategoryAnonc" ) );
                endforeach; ?>
            </ul>
        </div>
        <div class="rightSlide nextStory03$num"></div>
    </div>
<?php endif;

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