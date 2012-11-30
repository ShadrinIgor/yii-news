<div id="PageText">
    <?php
    $this->widget('addressLineWidget', array(
        'links'=>
            array(
                $page->name,
                )
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>

    <h1><?= $page->name ?></h1>
    <?= $page->description ?>
</div>