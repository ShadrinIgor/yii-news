<?php

class TagController extends Controller
{
	public function actionIndex()
	{
        $this->layout = "/layouts/inner";
        $error = false;
        $category = array();

        $id =  ( !empty( $_GET["id"] ) ) ? SiteHelper::checkedVaribal( $_GET["id"], "int" ) : "";
        if( empty( $id ) )$error = true;

        if( $error == false )
        {
            $tag = CatNewsTags::fetch( $id );
            if( $tag->id == 0 )$error = true;
        }

        if( $error == false )
        {
            $page = !empty( $_GET["page"] ) ? SiteHelper::getParam( $_GET["page"], 1, "int" ) : 1;
            $this->render('index',
                    array
                    (
                        "tag"  => $tag,
                        "page" => $page
                    )
                );
        }

        if( $error == true )$this->redirect("site/error");
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