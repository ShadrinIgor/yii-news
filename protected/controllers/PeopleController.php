<?php

class PeopleController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";

        $page = !empty( $_GET["page"] ) ? SiteHelper::getParam( $_GET["page"], 1, "int" ) : 1;
        $offset = 10;
        $peoples = DBQueryParamsClass::CreateParams()
                                ->setOrderBy( 'col desc, id desc' )
                                ->setPage( ( $page-1 )*$offset )
                                ->setLimit( $offset )
                                ->setCache( 0 );

        $links = array( Yii::t("page", "Люди"), );
        //$links[ Yii::t("page", "Люди") ] = "";

        $this->render('index',
            array(
                "peoples"       => CatalogPeople::fetchAll( $peoples, array("catalog_coutry", "catalog_people_cid")),
                "count"         => CatalogPeople::count( $peoples),
                "page"          => $page,
                "offset"        => $offset,
                "links"         => $links
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