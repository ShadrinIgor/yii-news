<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Виджет для вывода одной новости
 */
class fotoNewsWidget extends Widget
{
    public function run()
    {
        $queryParams = DBQueryParamsClass::CreateParams()
                        ->setConditions( "image!='' AND date> now()" )
                        ->setOrderBy( "pos DESC" )
                        ->setLimit( 10 );

        $listNewsFoto = CatalogNews::fetchAll( $queryParams );

        $queryParams = DBQueryParamsClass::CreateParams()
                        ->setConditions( "image!='' AND date <=now()" )
                        ->setOrderBy( "date DESC, pos DESC" )
                        ->setLimit( 10 );

        $listFoto = CatalogNews::fetchAll( $queryParams, array("catalog_cid", "catalog_country" ) );
        $this->render("fotoNews", array(
            "listFoto"     => $listFoto,
            "listNewsFoto" => $listNewsFoto,
        ));
    }
}
