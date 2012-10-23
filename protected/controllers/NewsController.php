<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
        $newsId = Yii::app()->getRequest()->getParam("id");
        if( !empty( $newsId ) )$newsData = CatalogNews::fetch( $newsId );

        if( $newsData->id>0 )
        {
            $newsData->setColView();
            $otherNewsParams = DBQueryParamsClass::CreateParams()
                                    ->setConditions("country=:country AND cid_id=:cid")
                                    ->setParams( array( ":country"=>$newsData->country->id, ":cid"=>$newsData->cid_id->id ) )
                                    ->setOrderBy( 'date desc, col desc' )
                                    ->setLimit( 5 );
            $this->render('index',
                array(
                    "otherNewsParams" => $otherNewsParams,
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