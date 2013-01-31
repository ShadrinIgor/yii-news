<div id="PageText">
    <?php
    Yii::app()->page->title = Yii::t( "page", "Теги");
    $this->widget('addressLineWidget', array(
        'links'=>$links,
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

    <h1><?= Yii::t( "page", "Теги") ?></h1>

    <div id="listTags">
        <?php
            foreach( $listTags as $tag )
            {
                echo '<a class="tag'.rand( 1, 6 ).'" href="'.SiteHelper::createUrl("tag/", array( "slug"=>$tag->tag_translate, "id"=>$tag->id )).'" title="'.$tag->name .' - тег новостей">'.$tag->name.'</a>';
            }
        ?>
    </div>
</div>