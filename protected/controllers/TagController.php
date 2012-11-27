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

            $offset = 10;
            $conditions = "";
            $params = array();

            $links = array(
                Yii::t( "page", "Теги") => array( 'tag/list', array( ) ),
                $tag->name
            );

            $conditions = " a.id=:tag_id AND b.tag_id = a.id AND catalog_news_as.id=b.news_id ";
            $params = array( ":tag_id"=>$tag->id,  );

            $listNews = CatalogNews::fetchAll(
                DBQueryParamsClass::CreateParams()
                    ->setWhere( "catalog_news catalog_news_as, cat_news_tags a, cat_news_tags_relation b" )
                    ->setConditions( $conditions )
                    ->setParams( $params )
                    ->setLimit( $offset )
                    ->setPage( ( $page-1 )*$offset ) );

            $countNews = CatalogNews::count(
                DBQueryParamsClass::CreateParams()
                    ->setWhere( "catalog_news catalog_news_as, cat_news_tags a, cat_news_tags_relation b" )
                    ->setConditions( $conditions )
                    ->setParams( $params )
            );

            if( !empty( $_GET["slug"] ) )$urlParams = array( "slug"=>$_GET["slug"] );
            if( !empty( $_GET["id"] ) )$urlParams = array_merge( $urlParams, array( "id"=>$_GET["id"]  ));

            $this->render('index',
                    array
                    (
                        "listNews"   => $listNews,
                        "countNews"  => $countNews,
                        "tag"        => $tag,
                        "page"       => $page,
                        "links"      => $links,
                        "offset"     => $offset,
                        "urlParams"  => $urlParams,
                    )
                );
        }

        if( $error == true )$this->redirect("site/error");
	}

    public function actionList()
    {
        $listTags = CatNewsTags::fetchAll(
            DBQueryParamsClass::CreateParams()
                ->setWhere( "cat_news_tags cat_news_tags_as, cat_news_tags_relation b" )
                ->setConditions( "b.tag_id = cat_news_tags_as.id" )
                ->setGroup( "b.tag_id" )
                ->setOrderBy( " count(b.id) DESC" )
                ->setLimit( 300 )
        );

        $links = array(
            Yii::t( "page", "Теги")
        );

        $this->render('list',
            array
            (
                "listTags"   => $listTags,
                "links"      => $links,
            )
        );
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