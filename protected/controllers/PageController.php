<?php

class PageController extends Controller
{
	public function actionIndex()
	{
        $error = false;
        $this->layout = "/layouts/inner";

        $slug = !empty( $_GET["slug"] ) ? $slug = SiteHelper::checkedVaribal( $_GET["slug"] ) : "";

        if( !empty( $slug ) )
        {
            $page = CatalogPages::fetchAll( DBQueryParamsClass::CreateParams()
                        ->setConditions('key_word=:key_word')
                        ->setParams( array( ':key_word'=> $slug ) )
                    );
        }

        if( !empty( $page[0] ) && $page[0]->id >0 )
        {
            $this->render('index',
                    array
                    (
                        "page"=>$page[0]
                    )
                );
        }
         else $this->redirect("site/error");
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