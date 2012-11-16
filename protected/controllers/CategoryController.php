<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";
        $error = false;

        $cidSlug =  ( !empty( $_GET["slug"] ) ) ? SiteHelper::checkedVaribal( $_GET["slug"] ) : "";
        if( empty( $cidSlug ) )$error = true;

        if( $error == false )
        {
            $category = CatalogCid::fetchAll(
                    DBQueryParamsClass::CreateParams()
                        ->setConditions( "key_word=:slug" )
                        ->setParams( Array( ":slug"=>$cidSlug ) )
                        ->setLimit(1)
                        ->setCache(0)
            );

            if( sizeof( $category ) >0 && $category[0]->id >0 )
            {
                $page = SiteHelper::getParam( "p", 1, "int" );
                $this->render('index',
                        array
                        (
                            "category"  => $category[0],
                            "page"      => $page
                        )
                    );
            }
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