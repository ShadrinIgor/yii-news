<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";
        $error = false;
        $category = array();
        $country = array();

        $cidSlug =  ( !empty( $_GET["slug"] ) ) ? SiteHelper::checkedVaribal( $_GET["slug"] ) : "";
        $countrySlug =  ( !empty( $_GET["country"] ) ) ? SiteHelper::checkedVaribal( $_GET["country"] ) : "";
        if( empty( $cidSlug ) && empty( $countrySlug ) )$error = true;

        if( $error == false )
        {
            if( !empty( $cidSlug ) )
            {
                $category = CatalogCid::fetchAll(
                    DBQueryParamsClass::CreateParams()
                        ->setConditions( "key_word=:slug" )
                        ->setParams( Array( ":slug"=>$cidSlug ) )
                        ->setLimit(1)
                        ->setCache(0) );
            }

            if( !empty( $cidSlug ) && sizeof( $category )==0 )$countrySlug = $cidSlug;

            if( !empty( $countrySlug ) )
            {
                $country = CatalogCountry::fetchAll(
                    DBQueryParamsClass::CreateParams()
                        ->setConditions( "key_word=:slug OR key_word2=:slug " )
                        ->setParams( Array( ":slug"=>$countrySlug ) )
                        ->setLimit(1)
                        ->setCache(0) );
            }

            if( ( sizeof( $category ) >0 && $category[0]->id >0 ) || ( sizeof( $country ) >0 && $country[0]->id >0 ) )
            {
                $page = !empty( $_GET["page"] ) ? SiteHelper::getParam( $_GET["page"], 1, "int" ) : 1;
                $cacheId = "category_";
                if( sizeof( $category )>0 )$cacheId .= "catid-".$category[0]->id;
                if( sizeof( $country )>0 )
                {
                    if( !empty( $cacheId ) )$cacheId.="_";
                    $cacheId .= "country-".$country[0]->id;
                }
                $cacheId.="_".$page;

//if( $page >1 || $this->beginCache( $cacheId, array('duration'=>3600) ) ) :

                $conditions = "date<=:date";
                $params = array( ":date"=>date("Y-m-d") );
                if( sizeof( $category )>0 )
                {
                    $conditions .= " AND cid_id=:cid_id";
                    $params =  array_merge( $params, array( ":cid_id" => $category[0]->id ) );
                    if( sizeof( $country )>0 )
                    {
                        $links = array(
                            $category[0]->name => array( 'category/', array("slug"=>$category[0]->key_word) ),
                            $country[0]->name,
                        );
                    }
                    else
                    {
                        $links = array(
                            $category[0]->name,
                        );
                    }
                }

                if( sizeof( $country )>0 )
                {
                    $conditions.=" AND country=:country";
                    $params = array_merge( $params, array( ":country" => $country[0]->id ) );

                    if( sizeof( $category ) ==0 )
                    {
                        $links = array(
                            $country[0]->name,
                        );
                    }
                }

                $offset = 10;
                $listNews = CatalogNews::fetchAll(
                    DBQueryParamsClass::CreateParams()
                        ->setConditions( $conditions )
                        ->setParams( $params )
                        ->setLimit( $offset )
                        ->setPage( ( $page-1 )*$offset )
                        ->setOrderBy( "date DESC, col DESC" )
                );

                $countNews = CatalogNews::count(
                    DBQueryParamsClass::CreateParams()
                        ->setConditions( $conditions )
                        ->setParams( $params )
                );

                $this->render('index',
                        array
                        (
                            "listNews"  => $listNews,
                            "countNews" => $countNews,
                            "offset"    => $offset,
                            "links"     => $links,
                            "category"  => $category,
                            "country"   => $country,
                            "afishi"    => CatalogNews::fetchAll( DBQueryParamsClass::CreateParams()
                                                    ->setConditions( "cid_id=:cid_id AND date>:date" )
                                                    ->setParams( array( ":cid_id"=>$category[0]->id, ":date"=>date("Y-m-d") ) )
                                                    ->setLimit( 6 )
                                                ),
                            "page"      => $page
                        )
                    );
            }
                else $error = true;
        }

        if( $error == true )$this->redirect("/site/error");
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}