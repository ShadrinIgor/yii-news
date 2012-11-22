<?php

class TagController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";
        $error = false;
        $category = array();

        $tag =  ( !empty( $_GET["tag"] ) ) ? SiteHelper::checkedVaribal( $_GET["tag"] ) : "";
        if( empty( $tag ) )$error = true;
echo $tag."*";
        die;
        if( $error == false )
        {
            $category = CatalogCid::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setConditions( "key_word=:slug" )
                    ->setParams( Array( ":slug"=>$cidSlug ) )
                    ->setLimit(1)
                    ->setCache(0) );


            if( ( sizeof( $category ) >0 && $category[0]->id >0 ) || ( sizeof( $country ) >0 && $country[0]->id >0 ) )
            {
                $page = !empty( $_GET["page"] ) ? SiteHelper::getParam( $_GET["page"], 1, "int" ) : 1;
                $this->render('index',
                        array
                        (
                            "category"  => $category,
                            "country"   => $country,
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