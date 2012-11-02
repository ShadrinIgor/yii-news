<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

    public $pageName = '';
    public $pageParent = array( "id"=> null, "name"=>null, "link"=>null );
    public $pageCatalogTable='';

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function render($view,$data=array(),$return=false)
    {
        if($this->beforeRender($view))
        {
            $data = array_merge( $data,
                array(
                    "Theme"     => Yii::app()->getTheme(),
                    "controller" => $this
                )
            );

            $output=$this->renderPartial($view,$data,true);
            if( ($layoutFile=$this->getLayoutFile($this->layout))!==false)
            {
                $output=$this->renderFile($layoutFile, array_merge( $data, array( "content" => $output ) ),true);
            }

            $this->afterRender($view,$output);

            $output=$this->processOutput($output);

            if($return)
                return $output;
            else
                echo $output;
        }
    }
    public function getAddressLine()
    {
        $category
        $this->widget('addressLineWidget', array(
            'links'=>array(
                $newsData->cid_id->name=>array('category/', array( "slug"=>$newsData->cid_id->key_word) ),
                $newsData->name,
            ),
        ));
    }
}