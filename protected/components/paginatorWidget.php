<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Игорь
 * Date: 20.09.12
 * Time: 16:00
 * Постраничное листание надо перенести в виджеты
 */
class paginatorWidget extends CWidget
{
    public $count;
    public $page;
    public $offset;
    public $url;
    public function run()
    {
        if( empty( $url ) )$this->url = Yii::app()->params["baseUrl"].Yii::app()->request->pathInfo;
        $this->render("paginator", array(
                    'count'  => $this->count,
                    'offset' => $this->offset,
                    'page'   => $this->page,
                    'url'    => $this->url
        ));
    }
}
