<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 04.11.12
 * Time: 2:29
 * To change this template use File | Settings | File Templates.
 */
class BannerInit extends CApplicationComponent
{
    var $position;
    var $category;

    /*
     * Инициализация
     */
    public function init( )
    {
        Yii::import("ext.banners.models.*");
    }

    public function getBaner( $category, $position )
    {
        $banner = false;
        $DBParams = DBQueryParamsClass::CreateParams()
                        ->setConditions( "category=:category" )
                        ->setParams( array( ":category"=>$category ))
                        ->setOrderBy( "count_show DESC" )
                        ->setLimit( 1 );

        list( $banner )= BBaners::fetchAll( $DBParams );

        // Окончание показа банера
        if( $banner->id >0 && strtotime( $banner->finish_date ) < time() )
        {
            $banner =false;
            $banner->update( array( "count_show"=>$banner->count_show+1 ) );

            // Отправляем уведомление о окончании заказщику
            if( $banner->email )
            {
/*                $subject = "Показ рекламного банера на сайте ".ZONA_HOST." успешно завершен";
                $message = "Здравствуйте<br/>
                            Показ рекламного банера на сайте ".ZONA_HOST." успешно завершен.<br/>
                            Параметры:<br/>
                            -------------------------------------------------<br/>\
                            Дата начала: ".date( "d.m.Y", strtotime( $start_date ) )."<br/>
                            Дата окнчания: ".date( "d.m.Y", strtotime( $finish_date ) )."<br/>
                            Количество показов: ".( $count_show + $addCount )."<br/>
                            <br/>
                            С уважением<br/>
                            Администрация сайта ".ZONA_HOST;

                mailto( $subject."-", $from='', $email, $message );  */
            }
        }

        // Дефолтовый банер
        if( !$banner )
        {
            $DBParams = DBQueryParamsClass::CreateParams()
                ->setConditions( "category=:category AND default=1" )
                ->setParams( array( ":category"=>$category ))
                ->setOrderBy( "count_show DESC" )
                ->setLimit( 1 );

            list( $banner ) = BBaners::fetchAll( $DBParams );
        }

/*
---------------------------------------
        static $listDefaultBaners;
        static $listBaners;

        list( $posId ) = mysql_fetch_array( mysql_query("SELECT id FROM b_keys WHERE name='".$key."'") );
        $pageId = $_SESSION["page"]["id"];

        $query = "SELECT * FROM b_baners WHERE `key`='".$posId."' AND page='".$pageId."' AND active=1 AND `default`=0".$dopSQl." ORDER BY count_show LIMIT 1 ";
        $line = mysql_fetch_array( mysql_query( $query ) );

        $id = $line["id"];
        $href = $line["href"];
        $banner = $line["image"];
        $type = $line["type"];
        $finish_date = $line["finish_date"];
        $email = $line["email"];
        $start_date = $line["start_date"];
        $count_show = $line["count_show"];
        $width = $line["width"];
        $height = $line["height"];

        $addCount = rand( 100, 200 );

        if( $id && strtotime( $finish_date ) < time() )
        {
            mysql_query( "UPDATE b_baners SET count_show=count_show+1,`active`=0  WHERE id='".$id."'" );

            if( $email )
            {
                $subject = "Показ рекламного банера на сайте ".ZONA_HOST." успешно завершен";
                $message = "Здравствуйте<br/>
                            Показ рекламного банера на сайте ".ZONA_HOST." успешно завершен.<br/>
                            Параметры:<br/>
                            -------------------------------------------------<br/>\
                            Дата начала: ".date( "d.m.Y", strtotime( $start_date ) )."<br/>
                            Дата окнчания: ".date( "d.m.Y", strtotime( $finish_date ) )."<br/>
                            Количество показов: ".( $count_show + $addCount )."<br/>
                            <br/>
                            С уважением<br/>
                            Администрация сайта ".ZONA_HOST;

                mailto( $subject."-", $from='', $email, $message );
            }
            $banner = false;
        }

        // Дефолтовый банер
        if( !$banner )
        {

        $line = mysql_fetch_array( mysql_query( "SELECT id, href, image, type, `width`, `height` FROM b_baners WHERE `key`='".$posId."' AND `default`=1".$dopSQl." ORDER BY count_show" ) );
        $listDefaultBaners[ $pageId ][ $posId ] = $line;


        list( $id, $href, $banner, $type, $width, $height ) = $line;
    }

if( $banner )
{
mysql_query( "UPDATE b_baners SET count_show=count_show+1 WHERE id='".$id."'" );
if( $type!=1 )$banner = "<a href=\"".$href."\" title=\"\"><img src=\"".$banner."\" alt=\"\" /></a>";
else
{
if( $width )$width = " width=\"".$width."\"";
if( $height )$height = "height=\"".$height."\"";
$banner = "<a href=\"".$href."\" title=\"\">
                    <object ".$width." ".$height." classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\">
                        <param value=\"".$banner."\" name=\"movie\"/>
                        <embed  ".$width." ".$height." src=\"".$banner."\" type=\"application/x-shockwave-flash\"/>
                </object></a>";
}
}

---------------------------------------
 */

        $controller = new Controller("index");
        $controller->layout = false;
        $controller->render( "ext.banners.views.index", array( "banner"=>$banner ) );
    }
}
