<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 04.11.12
 * Time: 2:29
 * To change this template use File | Settings | File Templates.
 */
class BannerInit extends CCApplicationComponent
{
    var $position;
    var $category;

    /*
     * Инициализация
     */
    public function init( )
    {
        Yii::import("ext.banners.models.*");
    }

    public function getBaner( $category, $position )
    {
        $DBParams = DBQueryParamsClass::CreateParams()
                        ->setConditions( "category=:category" )
                        ->setParams( array( ":category"=>$category ))
                        ->setOrderBy( "count_show DESC" )
                        ->setLimit( 1 );

        $banner = BBaners::fetchAll( $DBParams );

        $this->render( "index", array( "banner"=>$banner ) );
    }
}
