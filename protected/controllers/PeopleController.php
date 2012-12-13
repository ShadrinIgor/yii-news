<?php

class PeopleController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";

        $country = !empty( $_GET["country"] ) ? SiteHelper::getParam( $_GET["country"] ) : "";
        $category = !empty( $_GET["category"] ) ? SiteHelper::getParam( $_GET["category"] ) : "";
        $page = !empty( $_GET["page"] ) ? SiteHelper::getParam( $_GET["page"], 1, "int" ) : 1;

        $conditional=" 1=1 ";
        $params = array();
        $paginatorLinks = array();
        $pageTitle = Yii::t("page", "Люди");

        if( !empty( $country ) )
        {
            $country = CatalogCountry::fetchByKeyWord( $country );
            if( $country->id >0 )
            {
                $conditional .= " AND country=:country_id";
                $params = array_merge( $params, array( ":country_id"=>$country->id ) );
                $paginatorLinks = array_merge( $paginatorLinks, array( "country"=>$country->key_word ) );
                $pageTitle .= " ".$country->name2;
            }
        }

        if( !empty( $category ) )
        {
            $category = CatalogPeopleCid::fetchByKeyWord( $category );
            if( $category->id >0 )
            {
                $conditional .= " AND cid_id=:category_id";
                $params = array_merge( $params, array( ":category_id"=>$category->id ) );
                $paginatorLinks = array_merge( $paginatorLinks, array( "category"=>$category->key_word ) );
                $pageTitle = $category->name;
            }
        }

        $offset = 10;
        $peoples = DBQueryParamsClass::CreateParams()
                                ->setConditions( $conditional )
                                ->setParams( $params )
                                ->setOrderBy( 'col desc, id desc' )
                                ->setPage( ( $page-1 )*$offset )
                                ->setLimit( $offset )
                                ->setCache( 0 );

        $links = array( Yii::t("page", "Люди"), );

        $this->render('index',
            array(
                "peoples"           => CatalogPeople::fetchAll( $peoples, array("catalog_country", "catalog_people_cid")),
                "count"             => CatalogPeople::count( $peoples ),
                "page"              => $page,
                "offset"            => $offset,
                "links"             => $links,
                "paginatorLinks"    => $paginatorLinks,
                "pageTitle"         => $pageTitle
            ));

	}

    public function actionList()
    {
        echo "&";
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