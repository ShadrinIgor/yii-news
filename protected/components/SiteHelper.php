<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 27.09.12
 * Time: 1:20
 * To change this template use File | Settings | File Templates.
 */
class SiteHelper
{
    /*
     * Вункция возвращает правельный текст для alt и title
     */
    static function getStringForTitle( $value )
    {
        return str_replace( '"', "'", $value );
//        /
    }

    /*
     * Это часть необходимо для рендринга динамических блоков, типо rightColumn
     */
    static function renderDinamicPartial( $view, $data=array(), $return=false )
    {
        $controller = Yii::app()->controller;
        $viewPath = "";
        $output = "";

        if(($renderer=Yii::app()->getViewRenderer())!==null)
            $extension=$renderer->fileExtension;
        else
            $extension='.php';

        $countrollerVews = $controller->getViewPath().DIRECTORY_SEPARATOR.$view.$extension;
        $layoutsFolder = Yii::getPathOfAlias("viewsLayouts").DIRECTORY_SEPARATOR.$view.$extension;

        if( is_file( $countrollerVews ) )
        {
            $viewPath = $view;
        }
            elseif( is_file( $layoutsFolder ) )
            {
                $viewPath = "viewsLayouts.".$view;
            }

        if( !empty( $viewPath ) )
        {
            $output=$controller->renderPartial($viewPath,$data,true);

            if($return)
                return $output;
            else
                echo $output;
        }
    }

    static function createUrl($route,$params=array(),$ampersand='&')
    {
        if($route==='')
            $route=Yii::app()->controller->Id.'/'.Yii::app()->controller->action->Id;
        else if(strpos($route,'/')===false)
            $route=Yii::app()->controller->Id.'/'.$route;
        if($route[0]!=='/' && ($module=Yii::app()->controller->module)!==null)
            $route=$module->getId().'/'.$route;
        return Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
    }

    /*
     * Вывод связанный элементов таблицы, тим свящи HAS_MANY | MANY_MANY
     * @param RelationParamsClass $relationParams параметры связи
     * @param DBQueryParamsClass $QBQueryPrams Определяет в каком прядке, какие запис необходимы втаскивать
     * @return array $list Возвращает масив объектов
     */
    static function getRelation( RelationParamsClass $relationParams, DBQueryParamsClass $QBQueryPrams = null )
    {
        if( empty( $QBQueryPrams ) )$QBQueryPrams = new DBQueryParamsClass();

        $relationClass = $relationParams->getRightClass();
        $relationObj = new $relationClass;
        $relationTable = $relationObj->tableName();

//        $sql = "SELECT a.* FROM ".$relationTable." a, cat_relations b WHERE b.leftClass='".$relationParams->getLeftClass()."' AND b.rightClass='".$relationParams->getRightClass()."' AND b.leftId='".$relationParams->getLeftId()."' AND a.id = b.rightId LIMIT ".$QBQueryPrams->getLimit();

        $sqlDopWhere = ( $QBQueryPrams->getConditions() ) ? " ( ".$QBQueryPrams->getConditions()." ) AND " : "";
        $sqlOrder = ( $QBQueryPrams->getOrderBy()=="id" ) ? "a.id" : $QBQueryPrams->getOrderBy();

        $result = Yii::app()->db->createCommand( )
                    ->select( $QBQueryPrams->getFields() )
                    ->from( $relationTable." a, cat_relations b " )
                    ->where( $sqlDopWhere." ( b.leftClass='".$relationParams->getLeftClass()."' AND b.rightClass='".$relationParams->getRightClass()."' AND b.leftId='".$relationParams->getLeftId()."' AND a.id = b.rightId )", $QBQueryPrams->getParams() )
                    ->order( $sqlOrder.' '.$QBQueryPrams->getOrderType() )
                    ->limit( $QBQueryPrams->getLimit() )
                    ->queryAll();

        $list = array();
        if( is_array($result) && sizeof($result)>0 )
        {
            $obectClass = $relationParams->getRightClass();
            foreach( $result as $arrayValue )
            {
                $newObject =  new $obectClass;
                $newObject->setAttributesFromArray( $arrayValue );
                $list[] = $newObject;
            }
        }
        return $list;
    }

    /*
     * Обресайт текст по словам
     * @param text $text обрезаемый текст
     * @param int $count необходимое количество слов
     */
    static function getSubTextOnWorld( $text, $count )
    {
        $cout = substr( strip_tags( $text), 0, $count );
        $ar = explode( " ", $cout );
        $ar[ sizeof( $ar )-1 ] = "";
        $cout = implode( " ", $ar );

        if( strlen( $text )>$count )$cout.=" ...";
        return $cout;
    }

    /*
     * Вывод дату в заданном формате
     * @param string $date дата в формате YYYY-mm-dd
     * @param string $format формата даты
     */
    static function getDateOnFormat( $date, $format, $note = "" )
    {
        $classNme = get_called_class();
        $timeStamp = strtotime( $date );

        if( $timeStamp > 0 )
            return date( $format, $timeStamp );
        else
            trigger_error( "Не правельный формат переданной даты ( Класс: ".$classNme." | Дата: ".$date." ".$note.")", E_USER_NOTICE );

         return false;
    }

    static function getTags( $tags )
    {
        return "<div class=\"newsTags\">".$tags."</div>";
    }

    /*
     * Рендерим динапичные блок сайта ( Например: rightColumn )
     * @param string $view название вьющки
     * @param array $data параметры для отображения
     * @param bool $return определяет варинт возврата данных
     */
    static function renderDynamicViews( $view,$data=array(),$return=false )
    {
        return Yii::app()->controller->renderDynamicViews( $view, $data, $return );
    }


    static function getParam( $field, $default_value = null, $type="string" )
    {
        $value = "";
        if( !empty( $_GET[ $field ] ) )$value = $_GET[ $field ];
        if( !empty( $_POST[ $field ] ) )$value = $_POST[ $field ];

        if( empty( $value ) && !empty( $default_value ) )$value = $default_value;

        return self::checkedVaribal( $value, $type );
    }

    /*
     * Проверка корректности входящих параметров
     */
    static function checkedVaribal( $value, $type="string" )
    {
        if( $type == "int" )$value = abs( (int)$value );
        return $value;
    }

    /*
     * Постраничное листание надо перенести в виджеты
     */
    static function paginator()
    {
        global $src,$p,$lang;

        if( !$cid )$cid = $_SESSION["sql.cid"];
        if( !$where )$where = $_SESSION["sql.sql"];
        $dop_url = $_SESSION["sql.dop_url"];

        $p = $_SESSION["key"]["p"];
        if( !$p )$p=1;


        $query = $_SESSION["sql.sql"];
//echo $query."<Br/>";

        $count = mysql_num_rows( mysql_query($query) );

        if( !$action )$url =  NavigateUrl("", $_SESSION["page"]["id"] );
        else $url =  NavigateUrl("", $action );

        if( $_SESSION["url.dop"] )$url.=$_SESSION["url.dop"]."/";

        $url.=( $_SESSION["key"][0] ) ? $_SESSION["key"][0]."/" : "0/";
        $url.=( $_SESSION["key"][1] ) ? $_SESSION["key"][1]."/" : "0/";
//   $url.=( $_SESSION["key"][2] ) ? $_SESSION["key"][2]."/" : "0/";
//   $url.=( $_SESSION["key"][3] ) ? $_SESSION["key"][3]."/" : "0/";

        if($count>$col)
        {
            $link="temp_".$link;
            $not_link="temp_".$not_link;
            $activ="temp_".$active;

            $p=chek($p,1);

            $finish=ceil($count/$col);
            for($i=1;$i<=$finish;$i++)
            {
                $elem="";

                if($i==$p)$elem=$activ($i);
                else
                {
                    if((($i>($p-3))&&($i<($p+3)))||($i==1)||($i==$finish))
                    {
                        $elem.=$link($url."?p=".$i.$dop_url,$i);
                        $space="";
                    }
                    else
                    {
                        if(!$space){$elem.=$not_link(" ... ");$space=1;}
                    }
                }

                $c_cout.=$elem;
            }

            $cout= $_SESSION["s_lang_varibals"]["p_pages"].":".$c_cout;

            $cout.="   ".$_SESSION["s_lang_varibals"]["p_vsego"]." : ".$count;

            return $cout;
        }
    }
}
