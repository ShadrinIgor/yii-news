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
    /**
     * Навещивает обработчики событий
     * @static
     * @param CComponent $object
     * @return object
     *
     */
    public static function attacheHandlers(CComponent &$object) {
        $config = SiteHelper::getEventsConfig();
        foreach($config as $event=>$handlers) {
            if(!method_exists(get_class($object), $event))
                continue;

            foreach($handlers as $handler)
                $object->attachEventHandler( $event, $handler );
               // $object->$event = $handler;
        }
    }

    public static function getEventsConfig() {
        return require(Yii::getPathOfAlias('configPath').DIRECTORY_SEPARATOR.'handlers.php');
    }

    /*
     * Функция делает транслит руских слов в названии файлов
     */
    static function checkedUploadFileName( $fileName )
    {
        $rus=array("а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ш","щ","ь","ъ","э","ю","я"," ",".","-","(",")","j","w");
        $eng=array("a","b","v","g","d","e","e","sh","z","i","i","k","l","m","n","o","p","r","s","t","u","f","h","c","sh","sch","","","e","yu","ya","_",".","_","(",")","j","w");
        $text=strtolower($fileName);

        $str="";
        for($n=0;$n<strlen($text);$n++)
        {
            for($i=0;$i<sizeof($rus);$i++)
            {
                if($text[$n]==$rus[$i])
                {
                    $str.=$eng[$i];
                    break;
                }

                if($text[$n]==$eng[$i])
                {
                    $str.=$eng[$i];
                    break;
                }

                if(intval($text[$n]))
                {
                    $str.=$text[$n];
                    break;
                }
            }
        }

        $ar=explode(".",$str);
        $type=$ar[sizeof($ar)-1];

        $rn=rand(1,999);
        $str=$rn.$ar[0].".".$type;

        return $str;
    }

    /*
     *  Функция выводит путь для хранения картинок
     */
    static function getImagePath( $tableName, $id )
    {
        $imagePath = "f/";
        $imagePath .= $tableName."/";
        @mkdir( $imagePath );

        $imagePath .= date("Y")."/";
        @mkdir( $imagePath );

        $imagePath .= date("m")."/";
        @mkdir( $imagePath );

        $imagePath .= date("d")."/";
        @mkdir( $imagePath );

        if( !empty( $id ) )
        {
            $imagePath .=$id."/";
            @mkdir( $imagePath );
        }

        return $imagePath;
    }

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


    static function getParam( $fieldValue, $default_value = null, $type="string" )
    {
        $value = "";
        if( empty( $fieldValue ) && !empty( $_GET[ $fieldValue ] ) )$value = $_GET[ $fieldValue ];
        if( empty( $fieldValue ) && !empty( $_POST[ $fieldValue ] ) )$value = $_POST[ $fieldValue ];
        if( empty( $fieldValue ) && !empty( $default_value ) )$value = $default_value;
        return self::checkedVaribal( $fieldValue, $type );
    }

    /*
     * Проверка корректности входящих параметров
     */
    static function checkedVaribal( $value, $type="string" )
    {
        if( $type == "int" )$value = abs( (int)$value );
        if( $type == "string" )
        {
            $value = trim( strip_tags( $value ) );
        }
        return $value;
    }

    /*
     * Проверка корректности Slug для ссылок
     */
    static function checkedSlugName( $slug )
    {
        $arrayReplace = array( '$', "&", "?", "#" );
        $arrayReplace = str_replace( $arrayReplace, "", $slug );

        $arrayReplace = array( " - ", ' ', "_" );
        return str_replace( $arrayReplace, "-", $slug );
    }
}
