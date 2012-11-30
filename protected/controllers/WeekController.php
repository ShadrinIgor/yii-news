<?php

class WeekController extends Controller
{
	public function actionIndex()
	{
        if( $this->beginCache( "week_page", array('duration'=>3600) ) )
        {
            $curent = date( "w" )-1;
            date_default_timezone_set( "Asia/Tashkent" );

            $this->render('index',
                array(
                    "curent" => $curent,
                ));

            $this->endCache();
        }
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