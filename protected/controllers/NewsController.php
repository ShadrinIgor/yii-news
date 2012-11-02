<?php

class NewsController extends Controller
{
    public $pageName = 'Описание нововисти';
    public $pageCatalogTable='catalog_news';

	public function actionIndex()
	{
        $newsId = Yii::app()->getRequest()->getParam("id");
        if( !empty( $newsId ) )$newsData = CatalogNews::fetch( $newsId );
        $this->pageParent = array( "id"=>"category", "name"=>Yii::t( "page", "Новости" ), "link"=> SiteHelper::createUrl("category/", array( "slug"=>$newsData->cid_id->key_world )) );

        if( $newsData->id>0 )
        {
            $newsData->setColView();
            $otherNewsParams = DBQueryParamsClass::CreateParams()
                                    ->setConditions("country=:country AND cid_id=:cid AND id!=:id")
                                    ->setParams( array( ":country"=>$newsData->country->id, ":cid"=>$newsData->cid_id->id, ":id"=>$newsData->id ) )
                                    ->setOrderBy( 'date desc, col desc' )
                                    ->setLimit( 5 );
            $this->render('index',
                array(
                    "otherNews"       => CatalogNews::fetchAll( $otherNewsParams, array( "catalog_country", "catalog_cid" )),
                    "newsData"        => $newsData,
                ));
        }
            else $this->redirect("/");
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