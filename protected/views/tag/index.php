<div id="PageText">
    <?php
    Yii::app()->page->title = $tag->name;

    $this->widget('addressLineWidget', array(
        'links'=>$links,
            ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

    <h1><?= $tag->name ?></h1>

    <?php foreach( $listNews as $values )
    {
        $this->widget('newsWidget', array(
        'values'=>$values
        ));
    }
    ?>

    <?php $this->widget( 'paginatorWidget', array
    (
        "count"   => $countNews,
        "offset"  => $offset,
        "page"    => $page,
        "url"     => array( "tag/", $urlParams )
    ) );
    ?>
</div>